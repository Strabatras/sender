<?php

namespace Bacchus\Sender\Responses;

use Bacchus\Sender\Interfaces\ResponseInterface;


class Response implements ResponseInterface {

    public function headers(): HeadersResponse {
        // TODO: Implement headers() method.
    }

    public function trace(): TraceResponse {
        // TODO: Implement trace() method.
    }

    public function results(): ResultsResponse {
        // TODO: Implement results() method.
    }

    public function errors(): ErrorsResponse {
        // TODO: Implement errors() method.
    }


}