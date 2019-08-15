<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

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
    return $response->withJson($result,200);
});
//Select
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
//Delete
