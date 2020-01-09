<?php

namespace Bacchus\Sender\Transports;

use Bacchus\Sender\Interfaces\ResponseInterface;
use Bacchus\Sender\Interfaces\UriRequestInterface;
use Bacchus\Sender\Interfaces\TransportInterface;
use Bacchus\Sender\Responses\Response;


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

        if (!curl_errno($ch)) {
            //$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
            $this->curlGetInfo = curl_getinfo( $ch );
            echo "<pre>";
                print_r( $this->curlGetInfo() );
            echo "</pre>";
        }

        curl_close( $ch );

        $result = '{"response":[],"errors":[],"traceId":"asdasd-0345345-dvd34ew-2345345gs-sdgsdgsdg"}';

        echo "<pre>";
            print_r( $options );
            print_r( '<br>' );
            //print_r( $report );
            print_r( '<br> result => ' );
            print_r( $result );
        echo "</pre>";
    }

    public function response() : ResponseInterface {
        if ( $this->response === null ) {
            $response = new Response();
            $this->response = $response;
        }
        return $this->response();
    }
}