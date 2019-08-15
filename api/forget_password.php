<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//ยังไม่เสร็จ
$app->post('/forget_password', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result =  $database->select('user','*',[
        'AND' => [
            'email' => $data['email'],
            'password' => $data['password']
        ]
    ]);

    return $response->withJson($result,200);
});