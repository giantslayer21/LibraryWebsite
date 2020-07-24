
<?php
  require "header.php";

if (isset($_SESSION['userUid'])) {
  if($_SESSION['acctype']==3 ||$_SESSION['acctype']==2)
  {
     echo '<a href="addnewbook.php"><button class="btn7">Add New Book</button></a>';
  }
}


  require "includes/database.inc.php";
  $sql = "SELECT * from books;";
  $result= mysqli_query($conn2,$sql);
  $resCheck =mysqli_num_rows($result);
  echo '<div class="wrapper">
          <div class="grid-container">';
  if ($resCheck>0) {
    while ($row = mysqli_fetch_assoc($result)) {
      //$libid = $row['libid'];
      $bookid = $row['bookid'];
      $title = $row['title'];
      $author = $row['author'];
      $description =$row['description'];
      $bookcover=$row['bookcover'];
      // <h3>'. htmlspecialchars($title) .'</h3>
      // <img src="includes/'.htmlspecialchars($bookcover).'" height="200" >
      // <p class="price">Book ID : '. htmlspecialchars($bookid) .'</p>
      // <p>Author  : '. htmlspecialchars($author) .'</p>
      // <form action="bookdetails.php" method="post">
      //       <button type="submit" name="details-submit" value="'.htmlspecialchars($bookid).'">Book Details</button>
      //       </form>
      // <br><br>'
      echo '
      <div>
      <form action="bookdetails.php" method="post">
            <button type="submit" name="details-submit" value="'.htmlspecialchars($bookid).'">
            <a href="bookdetails.php">
            <img src="includes/'.htmlspecialchars($bookcover).'" height="200" width="150">
            </a>
            </button>
      </form></div>
      ';
    }
    echo '</div></div>';
    mysqli_close($conn2);
  }
  else {
    echo "Sorry, there seems to have been an error.. :p";
  }

 ?>
 <?php
   require "footer.php";
 ?>
