# Sender

Отправка запросов на URI

1. Настраиваемый транспорт запроса
2. Настраиваемый формат ответа

```
try {
    $sender = new \Bacchus\Sender\Sender();
    $sender->setUriRequest( $sender->getTransport()->getUriRequest()
                                                   ->setProtocol( \Bacchus\Sender\Enums\Transport::PROTOCOL_HTTPS )
                                                   ->setDomain( 'swapi.co/api/people/1/?format=json' )
                                                   ->setMethod( \Bacchus\Sender\Enums\Transport::METHOD_GET )
    )->setDataRequest( new \Bacchus\Sender\Requests\JsonRequest( [ 'field' => 'value' ] ) );
    $result = $sender->execute()->response()->get();
} catch ( \Exception $e ) {
    echo "<pre>";
        print_r( $e );
    echo "</pre>";
}
```