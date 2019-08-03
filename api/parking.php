<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->post('/parking', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result = $database->insert('parking', [
        'pname' => $data['pname'],
        'possition' => $data['possition'],
        'pImage' => $data['pImage'],//ติดไว้ก่อน
        'puuid' => $data['puuid'],
        'ename' => $data['ename']

    ]);



    return $response->withJson($result->rowCount(),200);
});