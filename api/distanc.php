<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
/*
$app->post('/distanc', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $database = $GLOBALS['dbconn'];


	if(isset($_GET['data1']) && isset($_GET['data2'])){
		$myfile = fopen("log_data.txt", "w") or die("Unable to open file!");
		$txt = $_GET['data1']." ".$_GET['data2'];
		fwrite($myfile, $txt);
		fclose($myfile);
	}
	$myfile = fopen("log_data.txt", "r") or die("Unable to open file!");
	echo fgets($myfile);
	fclose($myfile);


    return $response->withJson($myfile->rowCount(),200);

});*/