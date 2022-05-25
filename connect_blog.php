<?php
//Connect to database
$host = "localhost";
$user = "root";
$password = '';
$db_name = "blog";

$con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno())
{
  die("Database connection fault - ". mysqli_connect_error());
}
?>
