<?php
namespace Bacchus\Sender\Interfaces;

use Bacchus\Sender\Response\HeadersResponse;

/**
 * Interface ResponseInterface
 * @package Bacchus\Sender\Interfaces
 */
interface ResponseInterface {

    /**
     * Возвращает заголовки ответа
     * @return HeadersResponse
     */
    public function getHeadersResponse() : HeadersResponse;

    /**
     * Устанавливает заголовки ответа
     * @param HeadersResponse $headersResponse
     * @return $this
     */
    public function setHeadersResponse( HeadersResponse $headersResponse );

    /**
     * Возвращает тело ответа
     * @return mixed|null
     */
    public function getBodyResponse();

    /**
     * Устанавливает тело ответа
     * @param $bodyResponse
     * @return $this
     */
    public function setBodyResponse( $bodyResponse );

}