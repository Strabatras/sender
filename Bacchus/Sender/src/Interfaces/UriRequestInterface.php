<?php


namespace Bacchus\Sender\Interfaces;


interface UriRequestInterface {
    public function getProtocol() : string;
    public function setProtocol( string $protocol );
    public function getDomain() : string;
    public function setDomain( string $domain );
    public function getPath() : string;
    public function setPath( string $path );
    public function getPort() : int;
    public function setPort( int $path );
    public function getMethod() : string;
    public function setMethod( string $method );
}