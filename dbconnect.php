<?php
use Medoo\Medoo;

$dbconn = new Medoo([

	'database_type' => 'mysql',
	'database_name' =>'msu_parking',
	'server' => 'localhost',
	'username' => 'parking',
	'password' => '7Cv1n^4e',

	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
]);