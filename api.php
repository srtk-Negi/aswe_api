<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('HTTP/1.1 200 OK');

$url=$_SERVER['REQUEST_URI'];
$request_method=$_SERVER['REQUEST_METHOD'];

$path = parse_url($url, PHP_URL_PATH);
$pathClean =  trim($path,"/");
$pathComponents = explode("/", $pathClean);
$endPoint=$pathComponents[1];

switch($endPoint)
{
    case "add_equipment":
        $did=$_REQUEST['did'];
        $mid=$_REQUEST['mid'];
        $sn=$_REQUEST['sn'];
        include "add_equipment.php";
        add_equipment($did);
    case "list_devices":
        $output[]='Status: Success';
        $output[]='MSG: You have reached the list devices endpoint';
        $output[]='Action: None';
        $responseData=json_encode($output);
        echo $responseData;
        break;
    default:
        //header('Content-Type: application/json');
        //header('HTTP/1.1 200 OK');
        //should have logging->send the data to db
        $output[]='Status: ERROR';
        $output[]='MSG: Invalid or missing endpoint';
        $output[]='Action: None';
        $responseData=json_encode($output);
        echo $responseData;
        break;
}
die();
?>