<?php

function add_equipment($did){
    $output[]='Status: Success';
    $output[]='MSG: You have reached the add equipment endpoint';
    $output[]='Action: None';
    $output[]= $did;
    $responseData=json_encode($output);
    echo $responseData;
}

?>