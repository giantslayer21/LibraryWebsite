<?php
  require "header.php";
  require 'includes/database.inc.php';

    if (isset($_SESSION['userUid']))
    {
      //for user profile data
      if ($_SESSION['acctype']==1)
      {
        $uid=$_SESSION['userUid'];
        $sql = "SELECT * from users where uid='$uid';";
        $result= mysqli_query($conn2,$sql);
        $resCheck =mysqli_num_rows($result);

        if ($resCheck>0) {
          $row = mysqli_fetch_assoc($result);
          $id = $row['uid'];
          $name = $row['name'];
          $address = $row['address'];
          $pno= $row['phno'];
          $numofbooks= $row['numbooks'];
          $email=$row['email'];
          $img=$row['profilepic'];

          $sql2 = "call CalcFine('$uid');";
          $result= mysqli_query($conn2,$sql2);
          $resCheck =mysqli_num_rows($result);

          if ($resCheck>0) {
            $row = mysqli_fetch_assoc($result);
            $fine=$row['fine'];
          echo '
              <div class="card">
                <br>
                <img src="includes/'.htmlspecialchars($img).'" height="200">
                <h1>ID   :'. htmlspecialchars($id) .'</h1>
                <p class="title">Name         :'. htmlspecialchars($name) .'</p>
                <p>E-mail       :'. htmlspecialchars($email) .'</p>
                <p>Phone No.    :'. htmlspecialchars($pno) .'</p>
                <p>Books Issued :'. htmlspecialchars($numofbooks) .'</p>
                <p>Address      :'. htmlspecialchars($address) .'</p>';
                if($fine>0){
                echo '<p><b>Fine :'. htmlspecialchars($fine) .'</b></p>';}
                echo '
                <br><br>
                <form action="includes/profilepic.inc.php" method="post" enctype="multipart/form-data">
                  <label for="img-file"><b>Upload Profile Picture</b></label>
                  <input type="file" name="file" required style="padding-left:60px;">
                  <br>
                  <button type="submit" name="submit" class="btn6">Upload</button>
                </form>
              </div>';
            }
            else {
              echo "Sorry, there seems to have been an error2.. ";
              exit();
            }
        }
        else {
          echo "Sorry, there seems to have been an error.. ";
          exit();
        }
      }

      //for staff profile data
      else {
        $uid=$_SESSION['userUid'];
        $sql = "SELECT * from staff where staffid='$uid';";
        $result= mysqli_query($conn2,$sql);
        $resCheck =mysqli_num_rows($result);

        if ($resCheck>0) {
          $row = mysqli_fetch_assoc($result);
          $id = $row['staffid'];
          $name = $row['name'];
          $address = $row['address'];
          $pno= $row['phno'];
          $email=$row['email'];
          $img=$row['profilepic'];
          mysqli_close($conn2);
          echo '
              <div class="card">
                <br>
                <img src="includes/'.htmlspecialchars($img).'" height="200">
                <h1 class="title">ID       :'. htmlspecialchars($id) .'</h1>
                <p>Name      :'. htmlspecialchars($name) .'</p>
                <p>E-mail    :'. htmlspecialchars($email) .'</p>
                <p>Phone No. :'. htmlspecialchars($pno) .'</p>
                <p>Address   :'. htmlspecialchars($address) .'</p>
                <br><br>
                <form action="includes/profilepic.inc.php" method="post" enctype="multipart/form-data">
                <label for="img-file"><b>Upload Profile Picture</b></label>
                <input type="file" name="file" required style="padding-left:60px;">
                <br>
                <button type="submit" name="submit" class="btn6">Upload</button>
                </form>
              </div>';
        }
        else {
          echo "Sorry, there seems to have been an error.. ";
          exit();
        }
      }
    }
   ?>
