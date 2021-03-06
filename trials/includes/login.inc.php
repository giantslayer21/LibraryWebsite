<?php

if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];


    $sql = "SELECT * from users where uid=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else
    {
       mysqli_stmt_bind_param($stmt, "s", $mailuid);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       if ($row = mysqli_fetch_assoc($result))
       {
         $pwdcheck= password_verify($password,$row['pwd']);
         if ($pwdcheck==false)
         {
           header("Location: ../index.php?error=wrongpwd");
           exit();
         }
         elseif($pwdcheck==true)
         {
           session_start();
           $_SESSION['userId'] =$row['num'];
           $_SESSION['userUid'] =$row['uid'];
           $_SESSION['acctype'] =$row['Acctype'];
           header("Location: ../profile.php?login=success");
           exit();
         }
         else
         {
             header("Location: ../index.php?error=unknownerror");
             exit();
         }
       }
       else
       {
           header("Location: ../index.php?error=nouser");
           exit();
       }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
  header("Location: ../index.php");
  exit();
}
