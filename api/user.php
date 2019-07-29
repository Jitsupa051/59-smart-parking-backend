<?php
//Using namespace
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


$app->get('/user/{name}', function (Request $request, Response $response, array $args) {

    $database = $GLOBALS['dbconn'];

    $uname = $args['name'];
    $result  = $database->select('user','*',[
        'name' => $uname
    ]);
    return $response->withJson($result,200);
});


/*$app->get('/user/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $age = $args['age'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->post('/user', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $response->getBody()->write("Hello, $data[name] $data[age]");
    return $response;
});*/