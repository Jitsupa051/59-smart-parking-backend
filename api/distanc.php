<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/distanc', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result =$database->insert('user', [
        'name' => $data['name'],
        'lastname' => $data['lastname'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'password' => $data['password']

    ]);

