<?php
namespace Bacchus\Sender\Interfaces;

use Bacchus\Sender\Responses\HeadersResponse;
use Bacchus\Sender\Responses\TraceResponse;
use Bacchus\Sender\Responses\ResultsResponse;
use Bacchus\Sender\Responses\ErrorsResponse;

/**
 * Interface ResponseInterface
 * @package Bacchus\Sender\Interfaces
 */
interface ResponseInterface {
    public function headers() : HeadersResponse;
    public function trace() : TraceResponse;
    public function results() : ResultsResponse;
    public function errors() : ErrorsResponse;
}