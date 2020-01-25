<?php
namespace Bacchus\Sender\Requests;

use Bacchus\Sender\Interfaces\RequestInterface;

class JsonRequest implements RequestInterface {

    private $data = null;

    function __construct( array $data ) {
        $this->data = $data;
    }

    public function headers(): array {
        return [];
    }


}