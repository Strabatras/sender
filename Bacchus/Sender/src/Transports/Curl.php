<?php

namespace Bacchus\Sender\Transports;

use Bacchus\Sender\Enums\Transport;
use Bacchus\Sender\Interfaces\RequestInterface;
use Bacchus\Sender\Interfaces\ResponseInterface;
use Bacchus\Sender\Interfaces\UriRequestInterface;
use Bacchus\Sender\Interfaces\TransportInterface;
use Bacchus\Sender\Response\Response;
use Bacchus\Sender\Response\HeadersResponse;
use Bacchus\Sender\Exceptions\TransportException;

/**
 * Class Curl
 * @package Bacchus\Sender\Transports
 */
class Curl implements TransportInterface {

    private $uriRequest = null;
    private $dataRequest = null;
    private $curlExec = null;
    private $curlGetInfo = null;

    private $response = null;

    private function eraseResponse(){
        $this->curlExec = null;
        $this->curlGetInfo = null;
        $this->response = null;
    }

    private function curlExec(){
        return $this->curlExec;
    }

    private function curlGetInfo(){
        return $this->curlGetInfo;
    }

    private function uriRequest(){
        return $this->uriRequest;
    }

    private function headersResponse( HeadersResponse $headersResponse ){
        if( $curlGetInfo = $this->curlGetInfo() ) {
            $headersResponse->setHttpCode( ( isset( $curlGetInfo[ 'http_code'] ) ) ? ( $curlGetInfo[ 'http_code'] ) : ( 0 ) );
            $headersResponse->setContentType( ( isset( $curlGetInfo[ 'content_type'] ) ) ? ( $curlGetInfo[ 'content_type'] ) : ( '' ) );
        }
        return $headersResponse;
    }

    private function bodyResponse( $bodyResponse ){
        return $bodyResponse;
    }


    /**
     * Возвращает URI запроса
     * @return UriRequestInterface
     */
    public function getUriRequest(): UriRequestInterface {
        return $this->uriRequest();
    }

    /**
     * Устанавливает URI запроса
     * @param UriRequestInterface $uriRequest
     * @return $this
     */
    public function setUriRequest( UriRequestInterface $uriRequest ) {
        $this->uriRequest = $uriRequest;
        return $this;
    }

    /**
     * Возвращает данные запроса
     * @return RequestInterface|null
     */
    public function getDataRequest() :? RequestInterface {
        return $this->dataRequest;
    }

    /**
     * Устанавливает данные запроса
     * @param RequestInterface $dataRequest
     * @return TransportInterface
     */
    public function setDataRequest( RequestInterface $dataRequest ) {
        $this->dataRequest = $dataRequest;
        return $this;
    }

    /**
     * Выполнение запроса
     *
     * @throws TransportException
     */
    public function execute(){
        echo '<h5>' . __METHOD__ . '</h5>';

        $this->eraseResponse();
        $uri = $this->uriRequest();

        $options = [ CURLOPT_URL                => ( ( $uri->getProtocol() ) ? ( $uri->getProtocol() . '://' ) : ( '' ) ) . $uri->getDomain() . $uri->getPath()
                   , CURLOPT_HEADER             => false
                   , CURLOPT_RETURNTRANSFER     => true
                   , CURLOPT_FOLLOWLOCATION     => true
                   , CURLOPT_CONNECTTIMEOUT     => 30
                   , CURLOPT_PORT               => ( $uri->getPort() ) ? ( $uri->getPort() ) : ( 0 )
                   , CURLOPT_POST               => ( Transport::METHOD_POST === $uri->getMethod() ) ? ( 1 ) : ( 0 )
                   ];

        if ( $this->getDataRequest() && $options[ CURLOPT_POST ] ) {
            $dataRequest = $this->getDataRequest();
            $options[ CURLOPT_HTTPHEADER ] = $dataRequest->headers();
            $options[ CURLOPT_POSTFIELDS ] = $dataRequest->data();
        }

        try {
            $ch = curl_init();
            curl_setopt_array( $ch, $options );

            $this->curlExec = curl_exec( $ch );
            if ( curl_errno( $ch ) ) {
                throw new TransportException( 'Curl ' . curl_error( $ch ) );
            }
            $this->curlGetInfo = curl_getinfo( $ch );
        } finally {
            curl_close( $ch );
        }
    }

    /**
     * Ответ на выполненный запрос
     * @return ResponseInterface
     */
    public function response() : ResponseInterface {
        if ( $this->response === null ) {
            $this->response = new Response();
            $this->response->setHeadersResponse( $this->headersResponse( $this->response->getHeadersResponse() ) );
            $this->response->setBodyResponse( $this->bodyResponse( $this->curlExec() ) );
        }
        return $this->response;
    }
}