<?php
namespace Bacchus\Sender\Requests;

use Bacchus\Sender\Interfaces\UriRequestInterface;

/**
 * Class UriRequest
 * @package Bacchus\Sender\Transports
 */
class UriRequest implements UriRequestInterface {

    private $protocol = '';
    private $domain = '';
    private $path = '';
    private $port = 0;
    private $method = '';

    /**
     * Возвращает протокол соединения
     * @return string
     */
    public function getProtocol(): string {
        return $this->protocol;
    }

    /**
     * Устанавливает протокол соединения
     * @param string $protocol
     * @return UriRequestInterface
     */
    public function setProtocol( string $protocol ) :UriRequestInterface{
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * Возвращает домен соединения
     * @return string
     */
    public function getDomain(): string {
        return $this->domain;
    }

    /**
     * Устанавливает домен соединения
     * @param string $domain
     * @return UriRequestInterface
     */
    public function setDomain( string $domain ) :UriRequestInterface {
        $this->domain = $domain;
        return $this;
    }

    /**
     * Возвращает путь домена соединения
     * @return string
     */
    public function getPath(): string {
        return $this->path;
    }

    /**
     * Устанавливает путь домена соединения
     * @param string $path
     * @return UriRequestInterface
     */
    public function setPath( string $path ) : UriRequestInterface {
        $this->path = $path;
        return $this;
    }

    /**
     * Возвращает порт соединения
     * @return int
     */
    public function getPort(): int {
        return $this->port;
    }

    /**
     * Устанавливает порт соединения
     * @param int $port
     * @return UriRequestInterface
     */
    public function setPort( int $port ) : UriRequestInterface {
        $this->port = $port;
        return $this;
    }

    /**
     * Возвращает метод соединения
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * Устанавливает метод соединения
     * @param string $method
     * @return UriRequestInterface
     */
    public function setMethod( string $method ) : UriRequestInterface {
        $this->method = $method;
        return $this;
    }

}