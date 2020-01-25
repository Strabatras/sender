<?php
namespace Bacchus\Sender\Response;

use Bacchus\Sender\Interfaces\FormattedResponseInterface;
use Bacchus\Sender\Interfaces\ResponseInterface;

use Bacchus\Sender\Helper;
use Bacchus\Sender\Enums\Json;

/**
 * Class JsonResponse
 * Форматированный json ответ запроса
 *
 * @package Bacchus\Sender\Response
 */
class JsonResponse implements FormattedResponseInterface {

    private $response = null;

    protected function json() {
        if ( $this->getResponse() === null ) {
            return null;
        }
        return trim( $this->getResponse()->getBodyResponse() );
    }

    /**
     * Возвращает ответ на запрос
     * @return ResponseInterface|null
     */
    public function getResponse() :? ResponseInterface {
        return $this->response;
    }

    /**
     * Устанавливает ответ на запрос
     * @param ResponseInterface $response
     * @return $this
     */
    public function setResponse( ResponseInterface $response ) : FormattedResponseInterface {
        $this->response = $response;
        return $this;
    }

    /**
     * Получить получить разобранный результат json ответа
     * @param bool $assoc Конвертировать разобранную json строку в объект или массив
     * @return array|object|null Результат json ответа
     * @throws \Bacchus\Sender\Exceptions\JsonException
     */
    public function get( bool $assoc = Json::DECODE_TO_OBJECT ){
        $json = $this->json();
        if ( !$json ) {
            return null;
        }
        return Helper::json_decode( $json, ( Json::DECODE_TO_ARRAY === $assoc ) );
    }

}