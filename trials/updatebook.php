<?php
  require "header.php"
 ?>
<?php
$value=$_POST['issuereq-submit'];
// $sql = "INSERT into issue_request ( bookid , uid ) values ('$value','$id');";
// $result= mysqli_query($conn2,$sql);
// $resCheck =mysqli_num_rows($result);
$sql = "INSERT into issue_request ( bookid , uid ) values (?,?);";
$stmt = mysqli_stmt_init($conn2);
if (!mysqli_stmt_prepare($stmt,$sql)) {
 header("Location: ../books.php?error=sqlerror");
 exit();
}
else
{
  mysqli_stmt_bind_param($stmt, "ss", $value,$id);
  mysqli_stmt_execute($stmt);
  header("Location: ../books.php?error=success");
  exit();
}
mysqli_stmt_close($stmt);
mysqli_close($conn2);
}

 ?>

      <main>
        <div>
          <h1>Update Book</h1>
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error']=="invalidbookid") {
                echo '<p>Invalid Book ID<p>';
              }
              elseif ($_GET['error']=="sqlerror") {
                  echo '<p>SQL Error<p>';
              }
              elseif ($_GET['error']=="bookidexists") {
                  echo '<p>Book ID Already Exists<p>';
              }
              elseif ($_GET['error']=="success"){
                echo '<p>Book Added Successfuly<p>';
            }}
          ?>
          <form action="includes/books.inc.php" method="post" enctype="multipart/form-data">
            <input type="text" name="bid" placeholder="Book ID" value="" required>
            <br>
            <input type="text" name="title" placeholder="Title" required>
            <br>
            <input type="text" name="author" placeholder="Author Name" required>
            <br>
            <input type="number" name="copies" placeholder="Number of Copies" required min="1">
            <br>
            <input type="text" name="description" placeholder="Description" required>
            <br>
            <label for="img-file">Book Cover</label>
            <input type="file" name="file" placeholder="Choose Image" required>
            <button type="submit" name="book-submit">Add New Book</button>
          </form>
        </div>
      </main>


<?php
  require "footer.php"
?>
