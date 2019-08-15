<?php
//Using namespace
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//Select User
$app->get('/user/{uid}', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $uuid = $args['uid'];
    $result  = $database->select('user',[
        "name",
        "lastname",
        "phone",
        "email"
    ],[
        'uid' => $uuid
    ]);
    return $response->withJson($result,200);
});

//Insert User (register)
$app->post('/register', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result = $database->insert('user', [
        'Name' => $data['Name'],
        'lastName' => $data['lastName'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'password' => $data['password'],
        'facebookID' => $data['facebookID'],
        'status' => "using",
        'identity' => "user"
    ]);

    return $response->withJson($result->rowCount(),200);
});








