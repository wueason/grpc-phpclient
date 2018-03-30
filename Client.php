<?php
/**
 * GRPC PHP Client
 * Step:
 * 1. protoc --proto_path=protos --plugin=protoc-gen-grpc=/home/vagrant/git/grpc/bins/opt/grpc_php_plugin --grpc_out=protos/gen --php_out=protos/gen protos/helloworld.proto
 * 2. 根目录make
 * 3. 直接调用已生成proto类
 * 
 * @author Eason Wu<eason991@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

require_once 'vendor/autoload.php';

function greet($name)
{
    $client = new \Helloworld\GreeterClient('localhost:50051', [
        'credentials' => \Grpc\ChannelCredentials::createInsecure(),
    ]);
    $request = new \Helloworld\HelloRequest();
    $request->setName($name);
    list($reply, $status) = $client->SayHello($request)->wait();
    $message = $reply->getMessage();

    return $message;
}

$name = !empty($argv[1]) ? $argv[1] : 'world';
echo greet($name)."\n";
