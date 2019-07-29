<?php
//Using namespace
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//load framework
require 'vendor/autoload.php';

// Create silm app
$app = new \Slim\App;

require 'dbconnect.php';

// Require Webservice api
require 'api/user.php';
require 'api/login.php';
require 'api/parking.php';
require 'api/register.php';

// Run silm app
$app->run();



/*$app->get('/hello/{name}/{age}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $age = $args['age'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
//สร้าง service แบบ post
$app->post('/hello', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $response->getBody()->write("Hello, $data[name] $data[surname] $data[age] $data[major]");
    return $response;
});
*/