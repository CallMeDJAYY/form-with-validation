<?php
//define credtentials with db credentials
define("HOST", "localhost");
define("DBUSER", "root");
define("PASSWORD", "");
define("DB", "student_info");


//create connection string
$connection = mysqli_connect(HOST, DBUSER, PASSWORD, DB);

//check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>