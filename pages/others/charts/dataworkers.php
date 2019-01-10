<?php

header('Content-Type:application/json');

define('DB_HOST','127.0.0.1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','manpower');

$mysqli =new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD, DB_NAME);

if(!$mysqli){

    die("Connection failed: ".$mysqli->error);
}

//$selected = $_GET['Month'];
$selected=3;
$query = sprintf("SELECT jobType,SUM(workerCount) AS workerCount FROM supplier_job  GROUP BY jobType  ");

$result= $mysqli->query($query);

$data =array();

foreach ($result as $row){
    $data[]= $row;
}
$result->close();
$mysqli->close();

print json_encode($data);


?>
