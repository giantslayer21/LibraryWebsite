<?php
require "header.php";

    if (isset($_SESSION['userUid'])) {
      if($_SESSION['acctype']==3)
      {
        echo '<a href="addnewbranch.php"><button class="btn7">Add New Branch</button></a>';
      }

    }

require "includes/database.inc.php";
  $sql = "SELECT * from library;";
  $result= mysqli_query($conn2,$sql);
  $resCheck =mysqli_num_rows($result);

  if ($resCheck>0) {
    echo "<br><br><br><br><br><br>";
    while ($row = mysqli_fetch_assoc($result)) {
      //$libid = $row['libid'];
      $branch = $row['branch'];
      $address = $row['branchaddress'];
      echo '
          <div class="wrapper">
            <br>
            <h1>'. htmlspecialchars($branch) .'</h1>
            <p>'. htmlspecialchars($address) .'</p>
            <br><br>
            <form action="contact.php" method="post">
            <button type="submit" class="butt" name="contact-button" value="'.htmlspecialchars($branch).'">Contact</button>
            </form>
            <br><br><br>
          </div>';
    }
    mysqli_close($conn2);
  }
  else {
    echo "Sorry, there seems to have been an error.. :p";
  }

 ?>

 <?php
   require "footer.php";
 ?>
