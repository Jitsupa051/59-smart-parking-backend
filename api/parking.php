<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//Insert
$app->post('/parking', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result = $database->insert('parking', [
        'parkingName' => $data['parkingName'],
        'position' => $data['position'],
        'parkingImage' => $data['parkingImage'],//ติดไว้ก่อน
        'parkingUUID' => $data['parkingUUID'],
        'nameEquipment' => $data['nameEquipment']

    ]);
    return $response->withJson($result->rowCount(),200);
    //return $response->withJson($result,200);
});
//Select   Set to show as parkingID
$app->get('/parking/{parkingID}', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $uparkingID= $args['parkingID'];
    $result  = $database->select('parking',[
        "parkingName",
        "position",
        "nameEquipment",
        "parkingImage"
    ],[
        'parkingID' => $uparkingID
    ]);
    return $response->withJson($result,200);
});
//Select all
$app->get('/parking', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];

    $result  = $database->select('parking','*',[
        'AND' => [
            'status' => "using"
        ]
    ]);

    return $response->withJson($result,200);
});
//UpDate
