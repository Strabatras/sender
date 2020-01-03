<?php

namespace Bacchus\Sender\Transports;

use Bacchus\Sender\Interfaces\SetingsTranspotInterface;
use Bacchus\Sender\Interfaces\TransportInterface;


class Curl implements TransportInterface {

    private $settings = null;

    private function setting(){
        if ( $this->settings === null ) {
            $this->settings = new SettingsTransport();
        }
        return $this->settings;
    }

    public function getSettings(): SetingsTranspotInterface {
        return $this->setting();
    }

    public function setSettings( SetingsTranspotInterface $settings ) {
        $this->settings = $settings;
        return $this;
    }

    public function execute(){
        echo '<h5>' . __METHOD__ . '</h5>';


        $setting = $this->setting();
        $options = [ CURLOPT_URL    => ( ( $setting->getProtocol() ) ? ( $setting->getProtocol() . '://' ) : ( '' ) ) . $setting->getDomain() . $setting->getPath()
                   , CURLOPT_HEADER => 1
                   , CURLOPT_RETURNTRANSFER => 1
                   , CURLOPT_FOLLOWLOCATION => 0
                   , CURLOPT_CONNECTTIMEOUT => 5
                   , CURLOPT_TIMEOUT => 5
                   ];

        if ( $setting->getPort() ) {
            $options[ CURLOPT_PORT ] = $setting->getPort();
        }

        $options[ CURLOPT_URL ] = 'http://swapi.co/api/people/1/?format=json';
        $options[ CURLOPT_URL ] = 'http://mosburo.com/';

        $ch = curl_init();
        curl_setopt_array( $ch, $options );

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );

        $result = curl_exec( $ch );

        if (!curl_errno($ch)) {
            //$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
            $curlGetinfo = curl_getinfo( $ch );
            echo "<pre>";
                print_r( $curlGetinfo );
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
}