<?php

$servername="localhost";
$dbUsername="root";
$dbPassword="0k8Ro5g5kXBk";
$dbName="librarydb";

$conn2= mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn2){
  die("Connection Failed".mysqli_connect_error());
}
