<?php

$servername="localhost";
$dbUsername="root";
$dbPassword="0k8Ro5g5kXBk";
$dbName="loginsystem";

$conn= mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
  die("Connection Failed".mysqli_connect_error());
}
