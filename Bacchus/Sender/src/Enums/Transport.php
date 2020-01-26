<?php
namespace Bacchus\Sender\Enums;

/**
 * Class Transport
 * Перечисления - параметры транспорта
 *
 * @package Bacchus\Sender\Enums
 */
class Transport {
    /**
     * @const METHOD_GET Http метод GET
     */
    const METHOD_GET    = 'GET';

    /**
     * @const METHOD_POST Http метод POST
     */
    const METHOD_POST   = 'POST';

    /**
     * @const PROTOCOL_HTTP Протокол http
     */
    const PROTOCOL_HTTP   = 'http';

    /**
     * @const PROTOCOL_HTTP Протокол https
     */
    const PROTOCOL_HTTPS  = 'https';

}