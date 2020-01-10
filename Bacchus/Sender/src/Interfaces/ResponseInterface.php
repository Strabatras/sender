<?php
namespace Bacchus\Sender\Interfaces;

use Bacchus\Sender\Response\HeadersResponse;

/**
 * Interface ResponseInterface
 * @package Bacchus\Sender\Interfaces
 */
interface ResponseInterface {
    public function getHeadersResponse() : HeadersResponse;
    public function setHeadersResponse( HeadersResponse $headersResponse );
    public function getBodyResponse();
    public function setBodyResponse( $bodyResponse );

}