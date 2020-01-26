<?php
namespace Bacchus\Sender;

use Bacchus\Sender\Interfaces\FormattedResponseInterface;
use Bacchus\Sender\Interfaces\RequestInterface;
use Bacchus\Sender\Interfaces\TransportInterface;
use Bacchus\Sender\Interfaces\UriRequestInterface;
use Bacchus\Sender\Response\JsonResponse;
use Bacchus\Sender\Transports\Curl;
use Bacchus\Sender\Requests\UriRequest;

/**
 * Class Sender
 * @package Bacchus\Sender
 */
class Sender {

    private $transport = null;
    private $uriRequest = null;
    private $dataRequest = null;

    protected function transport() :TransportInterface {
        if ( $this->transport === null ) {
            $this->transport = new Curl();
            $this->transport->setUriRequest( new UriRequest() );
        }
        return $this->transport;
    }

    protected function formattedResponse( FormattedResponseInterface $formattedResponse = null  ) : FormattedResponseInterface {
        if ( $formattedResponse === null ){
            $formattedResponse = new JsonResponse();
        }
        return $formattedResponse;
    }

    /**
     * Возвращает транспорт
     * @return TransportInterface
     */
    public function getTransport() :TransportInterface {
        return $this->transport();
    }

    /**
     * Устанавливает транспорт
     * @param TransportInterface $transport
     * @return $this
     */
    public function setTransport( TransportInterface $transport ) : Sender {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Возвращает настройки транспорта
     * @return UriRequestInterface
     */
    public function getUriRequest() : UriRequestInterface {
        return $this->transport()->getUriRequest();
    }

    /**
     * Устанавливает настройки транспорта
     * @param UriRequestInterface $uriRequest
     * @return Sender
     */
    public function setUriRequest( UriRequestInterface $uriRequest ) : Sender {
        $this->uriRequest = $uriRequest;
        return $this;
    }

    /**
     * Устанавливает данные запроса
     * @param RequestInterface $dataRequest
     * @return Sender
     */
    public function setDataRequest( RequestInterface $dataRequest ) : Sender {
        $this->dataRequest = $dataRequest;
        return $this;
    }

    /**
     * @return $this
     * @throws Exceptions\TransportException
     */
    public function execute() : Sender {
        $transport = $this->transport();
        if ( $this->uriRequest ) {
            $transport->setUriRequest( $this->uriRequest );
        }
        if ( $this->dataRequest ){
            $transport->setDataRequest( $this->dataRequest );
        }
        $transport->execute();
        return $this;
    }

    public function response( FormattedResponseInterface $formattedResponse = null ) : FormattedResponseInterface {
        return $this->formattedResponse( $formattedResponse )
                    ->setResponse( $this->transport()->response() );
    }

}