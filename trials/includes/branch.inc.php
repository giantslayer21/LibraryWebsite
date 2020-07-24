<?php

if (isset($_POST['branch-submit'])) {
  require 'database.inc.php';

  $libid = $_POST['libid'];
  $address = $_POST['address'];
  $branch = $_POST['branch'];

    $sql = "SELECT * from library where libid=?";
    $stmt = mysqli_stmt_init($conn2);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../addnewbranch.php?error=sqlerror");
      exit();
    }
    else
    {
       mysqli_stmt_bind_param($stmt, "i", $libid);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);
       $resyltCheck = mysqli_stmt_num_rows($stmt);
       if (resultCheck > 0) {
         header("Location: ../addnewbranch.php?error=libidexists");
         exit();
       }
       else
       {
         $sql="INSERT INTO library (libid,branch,branchaddress) values(?,?,?)";
         $stmt = mysqli_stmt_init($conn2);
         if (!mysqli_stmt_prepare($stmt,$sql))
         {
           header("Location: ../addnewbranch.php?error=sqlerror");
           exit();
         }
         else
         {
           mysqli_stmt_bind_param($stmt, "iss", $libid,$branch,$address);
           mysqli_stmt_execute($stmt);
           header("Location: ../addnewbranch.php?error=success");
           exit();
         }
       }
    }

  mysqli_stmt_close($stmt);
  mysqli_close($conn2);
}
else {
  header("Location: ../addnewbranch.php");
  exit();
}
