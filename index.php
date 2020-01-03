<?php

include_once( __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR .  'Sender' . DIRECTORY_SEPARATOR . 'Autoloader.php' );

$autoloader = new Bacchus\Sender\Autoloader();
$autoloader->SplAutoloadRegister();
$autoloader->nameSpaceRegister( 'Bacchus\Sender', __DIR__ . DIRECTORY_SEPARATOR . 'Bacchus' . DIRECTORY_SEPARATOR . 'Sender' . DIRECTORY_SEPARATOR . 'src' );

$sender = new \Bacchus\Sender\Sender();


echo "<pre>";
print_r( $sender );
echo "</pre>";