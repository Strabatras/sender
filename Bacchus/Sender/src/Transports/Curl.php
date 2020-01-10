<?php

namespace Bacchus\Sender\Transports;

use Bacchus\Sender\Interfaces\ResponseInterface;
use Bacchus\Sender\Interfaces\UriRequestInterface;
use Bacchus\Sender\Interfaces\TransportInterface;
use Bacchus\Sender\Response\Response;
use Bacchus\Sender\Response\HeadersResponse;

/**
 * Class Curl
 * @package Bacchus\Sender\Transports
 */
class Curl implements TransportInterface {

    private $uriRequest = null;
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

    public function execute(){
        echo '<h5>' . __METHOD__ . '</h5>';

        $this->eraseResponse();
        $uri = $this->uriRequest();

        $options = [ CURLOPT_URL    => ( ( $uri->getProtocol() ) ? ( $uri->getProtocol() . '://' ) : ( '' ) ) . $uri->getDomain() . $uri->getPath()
                   , CURLOPT_HEADER => 1
                   , CURLOPT_RETURNTRANSFER => 1
                   , CURLOPT_FOLLOWLOCATION => 0
                   , CURLOPT_CONNECTTIMEOUT => 5
                   , CURLOPT_TIMEOUT => 5
                   ];

        if ( $uri->getPort() ) {
            $options[ CURLOPT_PORT ] = $uri->getPort();
        }

        $options[ CURLOPT_URL ] = 'http://swapi.co/api/people/1/?format=json';
        $options[ CURLOPT_URL ] = 'http://mosburo.com/';

        $ch = curl_init();
        curl_setopt_array( $ch, $options );

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );

        $this->curlExec = curl_exec( $ch );

        if ( !curl_errno( $ch ) ) {
            $this->curlGetInfo = curl_getinfo( $ch );
        }
        curl_close( $ch );
    }

    public function response() : ResponseInterface {
        if ( $this->response === null ) {
            $this->response = new Response();
            $this->response->setHeadersResponse( $this->headersResponse( $this->response->getHeadersResponse() ) );
            $this->response->setBodyResponse( $this->bodyResponse( $this->curlExec() ) );
        }
        return $this->response;
    }
}