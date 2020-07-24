<?php
require "header.php";
if (isset($_POST['details-submit'])) {
  require 'includes/database.inc.php';
  $value=$_POST['details-submit'];
  $sql = "SELECT * from books where bookid='$value';";
  $result= mysqli_query($conn2,$sql);
  $resCheck =mysqli_num_rows($result);
  if ($resCheck>0)
  { $row = mysqli_fetch_assoc($result);
    $bookid = $row['bookid'];
    $title = $row['title'];
    $author = $row['author'];
    $description =$row['description'];
    $bookcover =$row['bookcover'];
    $available=$row['available'];
    $num_copies=$row['num_copies'];
    echo '
        <br>
        <h3>'. htmlspecialchars($title) .'</h3>
        <img src="includes/'.htmlspecialchars($bookcover).'" height="200" >
        <p><b>Book ID : </b>'. htmlspecialchars($bookid) .'</p>
        <p><b>Author  : </b>'. htmlspecialchars($author) .'</p>
        <p><b>Description   : </b>'. htmlspecialchars($description) .'</p>';
        if (isset($_SESSION['userUid'])) {
          echo '
              <p><b>Total Copies  : </b>'. htmlspecialchars($num_copies) .'</p>
              <p><b>Available Now : </b>'. htmlspecialchars($available) .'</p>
              <br>';
          // if ($_SESSION['userUid']!=1) {
          //   echo '<form action="updatebooks.php" method="post">
          //         <button type="submit" name="edit-submit" value="'.htmlspecialchars($bookid).'">Edit Details</button>
          //         </form>';
          // }
        }
        exit();
  }
  else {
    echo "Sorry, there seems to have been an error.. :p";
    exit();
  }
}
else {
  header("Location: books.php");
  exit();
}
?>
