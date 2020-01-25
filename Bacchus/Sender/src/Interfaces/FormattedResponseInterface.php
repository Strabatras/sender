<?php
namespace Bacchus\Sender\Interfaces;

/**
 * Interface FormattedResponseInterface
 * Форматированный ответ на запрос
 *
 * @package Bacchus\Sender\Interfaces
 */
interface FormattedResponseInterface {

    /**
     * Возвращает ответ на запрос
     * @return ResponseInterface|null
     */
    public function getResponse(  ) :? ResponseInterface;

    /**
     * Устанавливает ответ на запрос
     * @param ResponseInterface $response
     * @return $this
     */
    public function setResponse( ResponseInterface $response ) : FormattedResponseInterface;
}