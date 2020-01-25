<?php
namespace Bacchus\Sender\Interfaces;


interface RequestInterface {
    public function headers() : array;
}