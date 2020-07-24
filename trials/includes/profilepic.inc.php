<?php

if (isset($_POST['submit'])) {
  require 'database.inc.php';
  require "../header.php";
  $id=$_SESSION['userUid'];
  $file = $_FILES['file'];

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
        $filedest='profile/'.$id.".".$fileExtReal;
        //echo "<br>".$filedest;
        move_uploaded_file($filetmpname,$filedest);
        if ($_SESSION['acctype']==1) {
          $sql = "update users set profilepic = '$filedest' where uid='$id';";
          $result= mysqli_query($conn2,$sql);
        }
        else {
          $sql = "update staff set profilepic = '$filedest' where staffid='$id';";
          $result= mysqli_query($conn2,$sql);
        }

        header("Location: ../profile.php?uploadsuccess");
      }
      else {
        echo "File size too big";
      }
    }
    else {
      echo "Error in uploading file...";
    }
  }
  else {
    echo "This type is not supported...";
  }

}


?>
