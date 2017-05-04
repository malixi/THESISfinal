<?php

private $host = "localhost";
private $db_name = "grayenterprise";
private $username = "root";
private $password = "";
public $conn;

$conn = mysql_connect($hostname, $username, $password);

if (!$conn)

{

die('Could not connect: ' . mysql_error());

}

mysql_select_db($dbname, $conn);

//This script is designed by Android-Examples.com

?>
