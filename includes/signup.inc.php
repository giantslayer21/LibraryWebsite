<?php

if (isset($_POST['signup-submit'])) {
  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $acctype = (int)$_POST['accounttype'];
  $password = $_POST['pwd'];
  $confirmpwd = $_POST['conf_pwd'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z1-9]*$/",$username))
  {
    header("Location: ../signup.php?error=invalidusernameandmail");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z1-9]*$/",$username))
  {
    header("Location: ../signup.php?error=invalidusername&mail=".$email);
    exit();
  }
  else if($password!=$confirmpwd)
  {
    header("Location: ../signup.php?error=mismatchedpwd&uid=".$username."&mail=".$email);
    exit();
  }
  else
  {
    $sql = "SELECT uid from users where uid=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else
    {
       mysqli_stmt_bind_param($stmt, "s", $username);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);
       $resyltCheck = mysqli_stmt_num_rows($stmt);
       if (resultCheck > 0) {
         header("Location: ../signup.php?error=usertaken");
         exit();
       }
       else
       {
         $sql="INSERT INTO users (uid,email,pwd,Acctype) values(?,?,?,?)";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt,$sql))
         {
           header("Location: ../signup.php?error=sqlerror");
           exit();
         }
         else
         {
           $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
           mysqli_stmt_bind_param($stmt, "sssi", $username,$email,$hashedPwd,$acctype);
           mysqli_stmt_execute($stmt);
           header("Location: ../signup.php?error=success");
           exit();
         }
       }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../signup.php");
  exit();
}
