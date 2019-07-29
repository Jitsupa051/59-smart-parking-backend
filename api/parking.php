<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->post('/parking', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $response->getBody()->write("Hello, $data[name] $data[age]");
    return $response;
});