<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/parkingspot', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result = $database->insert('parkingspot',[
        'parkingID' => $data['parkingID'],
        'parkingSpotName' => $data['parkingSpotName'],
        'status' => $data['status'],
        'activeOrInactive' => $data['activeOrInactive'],
        'distance' => $data['distance']


    ]);
    return $response->withJson($result->rowCount(),200);
    //return $response->withJson($result,200);

});


/*$app->post('/distanc', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $database->update("distanc",[
    ]);





});*/