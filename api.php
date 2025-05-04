<?php
//include("../functions.php");
//$url=$_SERVER['REQUEST_URI'];
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
//$output[]='Status: ERROR';
//$output[]='MSG: System Disabled';
//$output[]='Action: None';
//log_error($_SERVER['REMOTE_ADDR'],"SYSTEM DISABLED","SYSTEM DISABLED: $endPoint",$url,"api.php");*/
$url=$_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$pathClean =  trim($path,"/");
$pathComponents = explode("/", $pathClean);
$endPoint=$pathComponents[1];
$did=$_REQUEST['did'];
$something=$_REQUEST["something"];
switch($endPoint)
{
    case "list_devices":
        //include("list_devices.php");
        $output[]='Status: Success';
        $output[]='MSG: You have reached the list devices endpoint';
        $output[]='Action: None';
        $responseData=json_encode($output);
        echo $responseData;
        break;
    case "add_equipment":
        $did=$_REQUEST['did'];
        $mid=$_REQUEST['mid'];
        $sn=$_REQUEST['sn'];
        include("add_equipment.php");
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