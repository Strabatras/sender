<?php

include_once( __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR .  'Sender' . DIRECTORY_SEPARATOR . 'Autoloader.php' );

$autoloader = new Bacchus\Sender\Autoloader();
$autoloader->SplAutoloadRegister();
$autoloader->nameSpaceRegister( 'Bacchus\Sender', __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR . 'Sender' . DIRECTORY_SEPARATOR . 'src' );

try {
    $sender = new \Bacchus\Sender\Sender();
    $sender->setUriRequest( $sender->getTransport()->getUriRequest()
                                                   ->setProtocol( \Bacchus\Sender\Enums\Transport::PROTOCOL_HTTPS )
                                                   ->setDomain( 'swapi.co/api/people/1/?format=json' )
                                                   ->setMethod( \Bacchus\Sender\Enums\Transport::METHOD_GET )
    )->setDataRequest( new \Bacchus\Sender\Requests\JsonRequest( [ 'aaa' => 'asas' ] ) );
    $result = $sender->execute()->response()->get();

    echo "<pre>";
        print_r( $result );
    echo "</pre>";
} catch ( \Exception $e ) {
    echo "<pre>";
        print_r( get_class( $e ) );
        print_r( '<br>' );
        print_r( $e );
    echo "</pre>";
}

// https://swapi.co/api/people/1/?format=json
// http://mosburo.com/
// http://response.localhost/';
// https://jsonplaceholder.typicode.com/comments';

//phpinfo();