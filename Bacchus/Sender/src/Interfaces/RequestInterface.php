<?php
namespace Bacchus\Sender\Interfaces;


interface RequestInterface {
    /**
     * Передаваемые заголовки
     * @return array
     */
    public function headers() : array;

    /**
     * Данные для передачи
     * @return mixed
     */
    public function data();
}