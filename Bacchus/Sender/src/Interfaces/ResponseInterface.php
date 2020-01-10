<?php
namespace Bacchus\Sender\Interfaces;

use Bacchus\Sender\Response\HeadersResponse;
use Bacchus\Sender\Response\TraceResponse;
use Bacchus\Sender\Response\ResultsResponse;
use Bacchus\Sender\Response\ErrorsResponse;

/**
 * Interface ResponseInterface
 * @package Bacchus\Sender\Interfaces
 */
interface ResponseInterface {
    public function getHeadersResponse() : HeadersResponse;
    public function setHeadersResponse( HeadersResponse $headersResponse );
    public function getTraceResponse() : TraceResponse;
    public function setTraceResponse( TraceResponse $traceResponse ) ;
    public function getResultsResponse() : ResultsResponse;
    public function setResultsResponse( ResultsResponse $resultsResponse );
    public function getErrorsResponse() : ErrorsResponse;
    public function setErrorsResponse( ErrorsResponse $errorsResponse );
}