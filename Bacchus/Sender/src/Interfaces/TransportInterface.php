<?php
namespace Bacchus\Sender\Interfaces;

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
     * Выполнение запроса
     */
    public function execute();

    /**
     * Ответ на выполненный запрос
     * @return FormattedResponseInterface
     */
    public function response() : ResponseInterface;

}