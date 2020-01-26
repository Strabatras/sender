<?php
namespace Bacchus\Sender\Interfaces;

use Bacchus\Sender\Exceptions\TransportException;

/**
 * Interface TransportInterface
 * @package Bacchus\Sender\Interfaces
 */
interface TransportInterface {

    /**
     * Возвращает URI запроса
     * @return UriRequestInterface
     */
    public function getUriRequest() : UriRequestInterface;

    /**
     * Устанавливает URI запроса
     * @param UriRequestInterface $uriRequest
     * @return $this
     */
    public function setUriRequest( UriRequestInterface $uriRequest );

    /**
     * Возвращает данные запроса
     * @return RequestInterface|null
     */
    public function getDataRequest() :? RequestInterface;

    /**
     * Устанавливает данные запроса
     * @param RequestInterface $dataRequest
     * @return TransportInterface
     */
    public function setDataRequest( RequestInterface $dataRequest );

    /**
     * Выполнение запроса
     *
     * @throws TransportException
     */
    public function execute();

    /**
     * Ответ на выполненный запрос
     * @return ResponseInterface
     */
    public function response() : ResponseInterface;

}