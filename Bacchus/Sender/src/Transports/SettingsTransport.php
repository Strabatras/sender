<?php
namespace Bacchus\Sender\Transports;

use Bacchus\Sender\Interfaces\SetingsTranspotInterface;

/**
 * Class SettingsTransport
 * @package Bacchus\Sender\Transports
 */
class SettingsTransport implements SetingsTranspotInterface {

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
     * @return SetingsTranspotInterface
     */
    public function setProtocol( string $protocol ) :SetingsTranspotInterface{
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
     * @return SetingsTranspotInterface
     */
    public function setDomain( string $domain ) :SetingsTranspotInterface {
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
     * @return SetingsTranspotInterface
     */
    public function setPath( string $path ) : SetingsTranspotInterface {
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
     * @return $this
     */
    public function setPort( int $port ) : SetingsTranspotInterface {
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
     * @return $this
     */
    public function setMethod( string $method ) : SetingsTranspotInterface {
        $this->method = $method;
        return $this;
    }

}