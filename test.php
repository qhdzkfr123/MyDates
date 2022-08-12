<?php
include_once "vendor/autoload.php";
use MydatesTool\mydates\Dates;
$obj = new Dates();
var_dump($obj->weeks('2022-09-12 00:00:01'));