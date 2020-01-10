<?php
namespace Bacchus\Sender\Interfaces;

/**
 * Interface UriRequestInterface
 * @package Bacchus\Sender\Interfaces
 */
interface UriRequestInterface {

    /**
     * Возвращает протокол соединения
     * @return string
     */
    public function getProtocol() : string;

    /**
     * Устанавливает протокол соединения
     * @param string $protocol
     * @return UriRequestInterface
     */
    public function setProtocol( string $protocol );

    /**
     * Возвращает домен соединения
     * @return string
     */
    public function getDomain() : string;

    /**
     * Устанавливает домен соединения
     * @param string $domain
     * @return UriRequestInterface
     */
    public function setDomain( string $domain );

    /**
     * Возвращает путь домена соединения
     * @return string
     */
    public function getPath() : string;

    /**
     * Устанавливает путь домена соединения
     * @param string $path
     * @return UriRequestInterface
     */
    public function setPath( string $path );

    /**
     * Возвращает порт соединения
     * @return int
     */
    public function getPort() : int;

    /**
     * Устанавливает порт соединения
     * @param int $port
     * @return $this
     */
    public function setPort( int $path );

    /**
     * Возвращает метод соединения
     * @return string
     */
    public function getMethod() : string;

    /**
     * Устанавливает метод соединения
     * @param string $method
     * @return $this
     */
    public function setMethod( string $method );

}