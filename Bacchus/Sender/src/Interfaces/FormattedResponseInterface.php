<?php
namespace Bacchus\Sender\Interfaces;


interface FormattedResponseInterface {
    public function getResponse(  ) : ResponseInterface;
    public function setResponse( ResponseInterface $response );
}