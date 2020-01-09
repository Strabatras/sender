<?php
namespace Bacchus\Sender;

use Bacchus\Sender\Interfaces\TransportInterface;
use Bacchus\Sender\Interfaces\UriRequestInterface;
use Bacchus\Sender\Transports\Curl;
use Bacchus\Sender\Requests\UriRequest;

class Sender {

    private $transport = null;
    private $uriRequest = null;

    protected function transport() :TransportInterface {
        if ( $this->transport === null ) {
            $this->transport = new Curl();
            $this->transport->setUriRequest( new UriRequest() );
        }
        return $this->transport;
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
    public function setTransport( TransportInterface $transport ) {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Возвращает настройки транспорта
     * @return UriRequestInterface
     */
    public function getUriRequest() :UriRequestInterface {
        return $this->transport()->getUriRequest();
    }

    /**
     * Устанавливает настройки транспорта
     * @param UriRequestInterface $setingsTranspot
     * @return $this
     */
    public function setUriRequest( UriRequestInterface $uriRequest ) {
        $this->uriRequest = $uriRequest;
        return $this;
    }

    public function execute(){
        $transport = $this->transport();
        if ( $this->setingsTranspot ) {
            $transport->setSettings( $this->setingsTranspot );
        }
        $transport->execute();
    }

}