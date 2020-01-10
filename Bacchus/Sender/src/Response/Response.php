<?php
namespace Bacchus\Sender\Response;

use Bacchus\Sender\Interfaces\ResponseInterface;

/**
 * Class Response
 * @package Bacchus\Sender\Response
 */
class Response implements ResponseInterface {
    private $headersResponse = null;
    private $bodyResponse = null;

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
     * Возвращает тело ответа
     * @return mixed|null
     */
    public function getBodyResponse() {
        return $this->bodyResponse;
    }

    /**
     * Устанавливает тело ответа
     * @param $bodyResponse
     * @return $this
     */
    public function setBodyResponse( $bodyResponse ){
        $this->bodyResponse = $bodyResponse;
        return $this;
    }


}