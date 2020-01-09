<?php

include_once( __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR .  'Sender' . DIRECTORY_SEPARATOR . 'Autoloader.php' );

$autoloader = new Bacchus\Sender\Autoloader();
$autoloader->SplAutoloadRegister();
$autoloader->nameSpaceRegister( 'Bacchus\Sender', __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR . 'Sender' . DIRECTORY_SEPARATOR . 'src' );

$sender = new \Bacchus\Sender\Sender();
$sender->setUriRequest( $sender->getTransport()->getUriRequest()
                                    ->setProtocol('http')
                                    ->setDomain( 'response.localhost' )
                                    ->setPort( 80 )
                                    ->setMethod( 'get' )
);

$sender->execute();

echo "<pre>";
//print_r( $sender );
echo "</pre>";

//phpinfo();