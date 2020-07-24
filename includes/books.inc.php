<?php

if (isset($_POST['book-submit'])) {
  require 'database.inc.php';

  $bookID = $_POST['bid'];
  $author = $_POST['author'];
  $num = (int)$_POST['copies'];
  $title = $_POST['title'];
  $desc = $_POST['description'];

  if (!preg_match("/^[a-zA-Z1-9]*$/",$bid))
  {
    header("Location: ../addnewbook.php?error=invalidbookid");
    exit();
  }
  else
  {
    $sql = "SELECT bookid from books where bookid=?";
    $stmt = mysqli_stmt_init($conn2);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../addnewbook.php?error=sqlerror");
      exit();
    }
    else
    {
       mysqli_stmt_bind_param($stmt, "s", $bookID);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);
       $resyltCheck = mysqli_stmt_num_rows($stmt);
       if (resultCheck > 0) {
         header("Location: ../addnewbook.php?error=bookidexists");
         exit();
       }
       else
       {
         $sql="INSERT INTO books (bookid,num_copies,title,author,description) values(?,?,?,?,?)";
         $stmt = mysqli_stmt_init($conn2);
         if (!mysqli_stmt_prepare($stmt,$sql))
         {
           header("Location: ../addnewbook.php?error=sqlerror");
           exit();
         }
         else
         {
           mysqli_stmt_bind_param($stmt, "sisss", $bookID,$num,$title,$author,$description);
           mysqli_stmt_execute($stmt);
           header("Location: ../addnewbook.php?error=success");
           exit();
         }
       }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn2);
}
else {
  header("Location: ../addnewbook.php");
  exit();
}
