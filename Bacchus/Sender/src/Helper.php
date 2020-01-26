<?php
namespace Bacchus\Sender;

use Bacchus\Sender\Exceptions\JsonException;

/**
 * Class Helper
 * Вспомогательные методы
 *
 * @package Bacchus\Sender
 */
class Helper {

    /**
     * Декодирует строку JSON
     * @param string $json Строка json для декодирования.
     * @param bool $assoc Если TRUE, возвращаемые объекты будут преобразованы в ассоциативные массивы.
     * @param int $depth Указывает глубину рекурсии.
     * @param int $options Битовая маска из констант
     * @return array|object mixed Возвращает данные json, преобразованные в соответствующие типы
     * @throws JsonException
     */
    public static function json_decode( $json, $assoc = false, $depth = 512, $options = 0 ) {
        $data = \json_decode( $json, $assoc, $depth, $options );
        if ( JSON_ERROR_NONE !== json_last_error() ) {
            throw new JsonException ( 'json_decode error: ' . json_last_error_msg() );
        }
        return $data;
    }

    /**
     * Возвращает JSON-представление данных
     * @param array $value Значение, которое будет закодировано.
     * @param int $options Битовая маска, составляемая из значений
     * @param int $depth Устанавливает максимальную глубину. Должен быть больше нуля.
     * @return false|string Возвращает строку, закодированную JSON или FALSE в случае возникновения ошибки.
     * @throws JsonException
     */
    public static function json_encode( $value, $options = 0, $depth = 512 ) {
        $json = \json_encode( $value, $options, $depth );
        if ( JSON_ERROR_NONE !== json_last_error() ) {
            throw new JsonException( 'json_encode error: ' . json_last_error_msg() );
        }
        return $json;
    }

}