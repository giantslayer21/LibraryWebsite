<?php
require 'database.inc.php';
require "../header.php";


if (isset($_POST['issue-submit'])) {
      $bookID = $_POST['bid'];
      $userID = $_POST['uid'];
      echo $bookID;
      $sql = "SELECT * from users where uid=?";
      // $sql2 = "SELECT bookid,available from books where bookid=?";
      $stmt = mysqli_stmt_init($conn2);
      if (!mysqli_stmt_prepare($stmt,$sql))
      {
            header("Location: ../issue.php?error=sqlerror");
            exit();
      }
      else
      {
           mysqli_stmt_bind_param($stmt, "s", $userID);
           mysqli_stmt_execute($stmt);
           $result = mysqli_stmt_get_result($stmt);
           if (!$row = mysqli_fetch_assoc($result))
           {
               header("Location: ../issue.php?error=invalid_user");
               exit();
           }
           else
           {
             $num_of_books=$row['numbooks'];
             echo $num_of_books;
             if ($num_of_books<2) {
               $sql = "SELECT * from books where bookid='$bookID'";
               $result= mysqli_query($conn2,$sql);
               $resCheck =mysqli_num_rows($result);
               if ($resCheck == 0){
                   header("Location: ../issue.php?error=invalid_bookid");
                   exit();
               }
               else {
                 $row = mysqli_fetch_assoc($result);
                 $copies = $row['available'];
                 if($copies>0){
                   $sql="INSERT into issue_status (uid,bookid,duedate) VALUES(?,?,DATE_ADD(CURRENT_DATE, INTERVAL 7 DAY));";
                   $stmt = mysqli_stmt_init($conn2);
                   if (!mysqli_stmt_prepare($stmt,$sql)){
                     header("Location: ../issue.php?error=sqlerror");
                     exit();
                   }
                   else{
                     mysqli_stmt_bind_param($stmt, "ss", $userID,$bookID);
                     mysqli_stmt_execute($stmt);
                     mysqli_stmt_close($stmt);
                     mysqli_close($conn2);
                     // $var="issue";
                     // $sql="INSERT into issue_status (bookid,uid,issue_return) VALUES(?,?,?);";
                     // $stmt = mysqli_stmt_init($conn2);
                     // mysqli_stmt_prepare($stmt,$sql);
                     // mysqli_stmt_bind_param($stmt, "sss", $bookID,$userID,$var);
                     // mysqli_stmt_execute($stmt);
                     header("Location: ../issue.php?error=issue_success");
                     exit();
                   }
                 }
                 else {
                   header("Location: ../issue.php?error=no_books_available");
                   exit();
                 }
               }
             }
             else {
               header("Location: ../issue.php?error=cannot_issue_more_books");
               exit();
             }
          }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn2);
      //header("Location: ../issue.php");
      exit();
}

elseif (isset($_POST['return-submit'])) {
  $bookID = $_POST['bid'];
  $userID = $_POST['uid'];
  $sql = "SELECT * from users where uid=?";
  // $sql2 = "SELECT bookid,available from books where bookid=?";
  $stmt = mysqli_stmt_init($conn2);
  if (!mysqli_stmt_prepare($stmt,$sql))
  {
    header("Location: ../issue.php?error=sqlerror");
    exit();
  }
  else
  {
     mysqli_stmt_bind_param($stmt, "s", $userID);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
     $resultCheck = mysqli_stmt_num_rows($stmt);
     if ($resultCheck == 0)
     {
         header("Location: ../issue.php?error=invalid_user");
         exit();
     }
     else
     {
       $sql = "SELECT * from books where bookid='$bookID'";
       $result= mysqli_query($conn2,$sql);
       $resCheck =mysqli_num_rows($result);
       if ($resCheck == 0)
       {
           header("Location: ../issue.php?error=invalid_bookid");
           exit();
       }
       else {
         $row = mysqli_fetch_assoc($result);
         $copies = $row['available'];
         $total = $row['num_copies'];
         if($copies<$total)
         {  //"DELETE FROM issue_status WHERE uid = AND bookid = ;"
           // $sql="INSERT into issue_status (uid,bookid,duedate) VALUES(?,?,DATE_ADD(CURRENT_DATE, INTERVAL 7 DAY));";
           $sql="DELETE FROM issue_status WHERE uid =? AND bookid =? ;";
           $stmt = mysqli_stmt_init($conn2);
           if (!mysqli_stmt_prepare($stmt,$sql))
           {
             header("Location: ../issue.php?error=sqlerror");
             exit();
           }
           else
           {
             mysqli_stmt_bind_param($stmt, "ss", $userID,$bookID);
             mysqli_stmt_execute($stmt);
             header("Location: ../issue.php?error=return_success");
             exit();
           }
         }
         else {
           header("Location: ../issue.php?error=invalid_bookid");
           exit();
         }
       }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn2);
  header("Location: ../issue.php");
  exit();
}

else
{
  header("Location: ../issue.php");
  exit();
}
