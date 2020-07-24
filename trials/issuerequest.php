<?php
require 'includes/database.inc.php';
require "header.php";
if (isset($_POST['issuereq-submit']))
{
   $id = $_SESSION['userUid'];
   echo $id;
   $value=$_POST['issuereq-submit'];
   echo $value;
  // // $sql = "INSERT into issue_request ( bookid , uid ) values ('$value','$id');";
  // // $result= mysqli_query($conn2,$sql);
  // // $resCheck =mysqli_num_rows($result);
  // $sql = "INSERT into issue_request values (?,?);";
  // $stmt = mysqli_stmt_init($conn2);
  // if (!mysqli_stmt_prepare($stmt,$sql)) {
  //   // header("Location: ../books.php?error=sqlerror");
  //   exit();
  // }
  // else
  // {
  //    mysqli_stmt_bind_param($stmt, "ss", $value,$id);
  //    mysqli_stmt_execute($stmt);
  //    header("Location: ../books.php?error=success");
  //    exit();
  // }
  // mysqli_stmt_close($stmt);
  // mysqli_close($conn2);
}
