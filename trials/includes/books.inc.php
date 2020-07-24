<?php
require 'database.inc.php';
require "../header.php";

if (isset($_POST['book-submit'])) {
    $bookID = $_POST['bid'];
    $author = $_POST['author'];
    $num = (int)$_POST['copies'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (!preg_match("/^[a-zA-Z1-9]*$/",$bookID))
    {
        header("Location: ../addnewbook.php?error=invalidbookid");
        exit();
    }
    else
    {
      $sql = "SELECT bookid from books where bookid=?";
      $stmt = mysqli_stmt_init($conn2);
      if (!mysqli_stmt_prepare($stmt,$sql))
      {
        header("Location: ../addnewbook.php?error=sqlerror");
        exit();
      }
      else
      {
           mysqli_stmt_bind_param($stmt, "s", $bookID);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
           if ($resultCheck > 0)
           {
               header("Location: ../addnewbook.php?error=bookidexists");
               exit();
           }
           else
           {

             $file = $_FILES['img-file'];
             $filename = $file['name'];
             $filetmpname = $file['tmp_name'];
             $fileerror = $file['error'];
             $filetype = $file['type'];
             $filesize = $file['size'];
             //echo $filetmpname;

             $fileExt=explode(".",$filename);
             $fileExtReal=strtolower(end($fileExt));
             $allowed=array('jpg','jpeg','png');

             if (in_array($fileExtReal,$allowed)) {
               if ($fileerror===0) {
                 if ($filesize<1000000) {
                   //$filenewname=uniqid('',true).".".$fileExtReal;
                   $filedest='bookcover/'.$bookID.".".$fileExtReal;
                   //echo "<br>".$filedest;
                   move_uploaded_file($filetmpname,$filedest);
                 }
                 else {
                   echo "File size too big";
                   exit();
                 }
               }
               else {
                 echo "Error in uploading file...";
                 exit();
               }
             }
             else {
               echo "This type is not supported...";
               exit();
             }


               $sql="INSERT INTO books (bookid,title,author,description,num_copies,available,bookcover) values(?,?,?,?,?,?,?)";
               $stmt = mysqli_stmt_init($conn2);
               if (!mysqli_stmt_prepare($stmt,$sql))
               {
                 header("Location: ../addnewbook.php?error=sqlerror");
                 exit();
               }
               else
               {
                 mysqli_stmt_bind_param($stmt, "ssssiis", $bookID,$title,$author,$description,$num,$num,$filedest);
                 mysqli_stmt_execute($stmt);
                 header("Location: ../addnewbook.php?error=success&uploadsuccess");
                 exit();
               }
           }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn2);
}

//elseif (isset($_POST['issuereq-submit'])){
//   $id=$_SESSION['userUid'];

//    $value=$_POST['issuereq-submit'];
//   // $sql = "INSERT into issue_request ( bookid , uid ) values ('$value','$id');";
//   // $result= mysqli_query($conn2,$sql);
//   // $resCheck =mysqli_num_rows($result);
//   $sql = "INSERT into issue_request ( bookid , uid ) values (?,?);";
//   $stmt = mysqli_stmt_init($conn2);
//   if (!mysqli_stmt_prepare($stmt,$sql)) {
//     header("Location: ../books.php?error=sqlerror");
//     exit();
//   }
//   else
//   {
//      mysqli_stmt_bind_param($stmt, "ss", $value,$id);
//      mysqli_stmt_execute($stmt);
//      header("Location: ../books.php?error=success");
//      exit();
//   }
//   mysqli_stmt_close($stmt);
//   mysqli_close($conn2);
// }

else
{
  header("Location: ../books.php");
  exit();
}
