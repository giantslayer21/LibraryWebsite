<?php

$servername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="librarydb";

$conn2= mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn2){
  die("Connection Failed".mysqli_connect_error());
}
