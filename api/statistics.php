<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/statistics', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result = $database->insert('statistics',[
        'parkingID' => $data['parkingID'], //การจอยข้อมูลของ parkingID มาลง statistics
        'userID' => $data['userID'],

        'dateAndTimeCheckIn' => $data['dateAndTimeCheckIn'],
        'dateAndTimeCheckOut' => $data['dateAndTimeCheckOut'],
        'dateBook' => $data['dateBook'],
        'status' => $data['status']

    ]);
    //return $response->withJson($database->error(),200);
    return $response->withJson($result->rowCount(),200);
    //return $response->withJson($result,200);
});


$app->get('/statistics/{userID}', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $uuid = $args['userID'];
    $result  = $database->select('statistics',[
        '[>]parking' => ["parkingID"],
        '[>]user' => ["userID"]

    ],[
        "parking.parkingName",
        "dateBook",
        "dateAndTimeCheckIn",
        "dateAndTimeCheckOut"
    ],[
        'userID' => $uuid
    ]);
    return $response->withJson($result,200);
});