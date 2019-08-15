<?php
//Using namespace
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

// Create Slim app
$app = new \Slim\App;

require 'dbconnect.php';

// Require Webservice api
require 'api/user.php';
require 'api/login.php';
require 'api/parking.php';
require 'api/parkingspot.php';


// Run silm app
$app->run();



