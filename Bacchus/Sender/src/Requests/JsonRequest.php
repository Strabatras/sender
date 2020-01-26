<?php
namespace Bacchus\Sender\Requests;

use Bacchus\Sender\Helper;
use Bacchus\Sender\Interfaces\RequestInterface;

class JsonRequest implements RequestInterface {

    private $data = null;
    private $json = null;

    function __construct( array $data ) {
        $this->data = $data;
    }

    protected function _data() : array {
        return $this->data;
    }

    protected function jsonString() : string {
        if ( $this->json === null ) {
            $this->json = Helper::json_encode( $this->_data() );
        }
        return $this->json;
    }

    /**
     * Передаваемые заголовки
     * @return array
     */
    public function headers(): array {
        return [ 'Content-Type:application/json'
               , 'Content-Length: ' . strlen( $this->jsonString() )
        ];
    }

    /**
     * Данные для передачи
     * @return mixed
     */
    public function data() : string {
        return $this->jsonString();
    }

}