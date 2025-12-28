<?php $servername = "localhost";
$username = "root";
$password = "";
$db = "login";
$conn = new mysqli($servername,$username,$password,$db,3306);
if($conn->connect_error){
    die("caonnection failed.$conn->connect_error");
}
echo "connectiom successfull";