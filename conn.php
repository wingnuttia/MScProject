<?php

$pw="4R03vpS5SGrv3jNw";								//declare password
$user = "kgreen05";									//declare MySQL username
$webserver = "kgreen05.lampt.eeecs.qub.ac.uk";		//declare webserver
$db = "kgreen05";									//declare DB

$conn = new mysqli($webserver, $user, $pw, $db);	//mysqli api library in PHP to connect to the DB

//failed connection
if($conn->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}
 ?>