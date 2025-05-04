<?php
function get_db($db){ 
    $hostname = "ec2-3-144-11-129.us-east-2.compute.amazonaws.com";
    $username = "web_user";
    $password = "*k8WZ!kK.zlgdo(0";
    $dblink = new mysqli($hostname,$username,$password,$db);
    if (mysqli_connect_error()){
        die("Error connecting to the database: ".mysqli_connect_error());
    }
    return $dblink;
}

?>