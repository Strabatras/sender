<?php
namespace Bacchus\Sender\Response;

use Bacchus\Sender\Interfaces\FormattedResponseInterface;
use Bacchus\Sender\Interfaces\ResponseInterface;

class JsonResponse implements FormattedResponseInterface {

    private $response = null;

    public function getResponse(): ResponseInterface {
        return $this->response;
    }

    public function setResponse( ResponseInterface $response ) {
        $this->response = $response;
        return $this;
    }



}