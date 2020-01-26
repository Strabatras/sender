<?php
namespace Bacchus\Sender\Enums;

/**
 * Class Json
 * Перечисления - параметры json
 *
 * @package Bacchus\Sender\Enums
 */
class Json {
    /**
     * @const DECODE_TO_ARRAY Конвертировать разобранную json строку в массив
     */
    const DECODE_TO_ARRAY  = 0;
    /**
     * @const DECODE_TO_OBJECT Конвертировать разобранную json строку в объект
     */
    const DECODE_TO_OBJECT = 1;
}