<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//Insert
$app->post('/parkingspot', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result = $database->insert('parkingspot',[
        'parkingID' => $data['parkingID'], //การจอยข้อมูลของ parkingID มาลง parkingspot

        'parkingSpotName' => $data['parkingSpotName'],
        'status' => $data['status'],
        'activeOrInactive' => $data['activeOrInactive'],
        'distance' => $data['distance']

    ]);
    return $response->withJson($result->rowCount(),200);
    //return $response->withJson($result,200);

});

//UpDate
$app->post('/parkingspot/{parkingSpotID}', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $UparkingSpotID = $args['parkingSpotID'];
    $result = $database->update('parkingspot', [
        'activeOrInactive' => $data['activeOrInactive'],
        'distance' => $data['distance'],
    ],[
        'parkingSpotID' => $UparkingSpotID
    ]);

    //return $response->withJson($database->error(),200);
    return $response->withJson($result->rowCount(),200);
    //return $response->withJson($result,200);

});