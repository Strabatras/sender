<?php

include_once( __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR .  'Sender' . DIRECTORY_SEPARATOR . 'Autoloader.php' );

$autoloader = new Bacchus\Sender\Autoloader();
$autoloader->SplAutoloadRegister();
$autoloader->nameSpaceRegister( 'Bacchus\Sender', __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR . 'Sender' . DIRECTORY_SEPARATOR . 'src' );

$sender = new \Bacchus\Sender\Sender();
$sender->setUriRequest( $sender->getTransport()->getUriRequest()
                                    ->setProtocol('https')
                                    ->setDomain( 'swapi.co/api/people/1/?format=json' )
                                    ->setMethod( 'get' )
);
try {
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