<?php
namespace Bacchus\Sender\Interfaces;

/**
 * Interface TransportInterface
 * @package Bacchus\Sender\Interfaces
 */
interface TransportInterface {
    public function getUriRequest() : UriRequestInterface;
    public function setUriRequest( UriRequestInterface $uriRequest );
    public function response();
    public function execute();
}