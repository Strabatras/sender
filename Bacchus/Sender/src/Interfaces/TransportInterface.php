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
     * Выполнение запроса
     *
     * @throws TransportException
     */
    public function execute();

    /**
     * Ответ на выполненный запрос
     * @return FormattedResponseInterface
     */
    public function response() : ResponseInterface;

}