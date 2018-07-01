<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Links with protobuf runtime
    require_once "../vendor/autoload.php";
    require_once "../proto/GPBMetadata/Hello.php";
    require_once "../proto/Service/Reply.php";
    require_once "../proto/Service/Request.php";
    require_once "../proto/Service/GreeterClient.php";

    $name = "User";
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
    }

    // Объявляем клиента
    $client = new Service\GreeterClient('localhost:8085', [
        'credentials' => Grpc\ChannelCredentials::createInsecure(),
        'timeout' => 1000
    ]);

    $request = new Service\Request();
    $request->setName($name);

    list($reply, $status) = $client->SayHello($request)->wait();
    
    if (is_null($reply)) {
        echo "Error: $status->code $status->details";
    } else {
        $message = $reply->getMessage();
        echo $message;
    }

    echo "<br>";

    list($reply, $status) = $client->SayHelloAgain($request)->wait();
    
    if (is_null($reply)) {
        echo "Error: $status->code $status->details";
    } else {
        $message = $reply->getMessage();
        echo $message;
    }