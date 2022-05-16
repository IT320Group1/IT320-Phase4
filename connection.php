<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "thecomfortzone";

if(!$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
