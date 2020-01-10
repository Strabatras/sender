<?php

namespace Bacchus\Sender\Response;

use Bacchus\Sender\Interfaces\ResponseInterface;


class Response implements ResponseInterface {

    private $headersResponse = null;
    private $traceResponse = null;
    private $resultsResponse = null;
    private $errorsResponse = null;

    /**
     * Возвращает заголовки ответа
     * @return HeadersResponse
     */
    public function getHeadersResponse(): HeadersResponse {
        if ( $this->headersResponse === null ) {
            $this->headersResponse = new HeadersResponse();
        }
        return $this->headersResponse;
    }

    /**
     * Устанавливает заголовки ответа
     * @param HeadersResponse $headersResponse
     * @return $this
     */
    public function setHeadersResponse( HeadersResponse $headersResponse ) {
        $this->headersResponse = $headersResponse;
        return $this;
    }

    /**
     * Возвращает данные трассировки ответа
     * @return TraceResponse
     */
    public function getTraceResponse(): TraceResponse {
        if ( $this->traceResponse === null ) {
            $this->traceResponse = new TraceResponse();
        }
        return $this->traceResponse;
    }

    /**
     * Устанавливает данные трассировки ответа
     * @param TraceResponse $traceResponse
     * @return $this
     */
    public function setTraceResponse( TraceResponse $traceResponse ) {
        $this->traceResponse = $traceResponse;
        return $this;
    }

    /**
     * Возвращает результат выполнения из ответа
     * @return ResultsResponse
     */
    public function getResultsResponse(): ResultsResponse {
        if ( $this->resultsResponse === null ) {
            $this->resultsResponse = new ResultsResponse();
        }
        return $this->resultsResponse;
    }

    /**
     * Устанавливает результат выполнения из ответа
     * @param ResultsResponse $resultsResponse
     * @return $this
     */
    public function setResultsResponse( ResultsResponse $resultsResponse ) {
        $this->resultsResponse = $resultsResponse;
        return $this;
    }

    /**
     * Возвращает ошибки выполнения из ответа
     * @return ErrorsResponse
     */
    public function getErrorsResponse(): ErrorsResponse {
        if ( $this->errorsResponse === null ) {
            $this->errorsResponse = new ErrorsResponse();
        }
        return $this->errorsResponse;
    }

    /**
     * Устанавливает ошибки выполнения из ответа
     * @param ErrorsResponse $errorsResponse
     * @return $this
     */
    public function setErrorsResponse( ErrorsResponse $errorsResponse ) {
        $this->errorsResponse = $errorsResponse;
        return $this;
    }


}