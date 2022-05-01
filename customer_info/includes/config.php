<?php 
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="newosms_db";

// create Connection
$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);

// Checking Connection
/*if($conn->connect_error){
    die("Connection Failed!");
}

else{
    echo "Connect";
}

*/
?>