<?php
  require "header.php"
 ?>


      <main>
        <br><br><br>
        <article >
          <h1>Add a New Book</h1>
          <div class="form">
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
              }
              elseif ($_GET['error']=="cover_big") {
                  echo '<p>Cover Picture is Too Large<p>';
              }
              elseif ($_GET['error']=="upload_error") {
                  echo '<p>Error in Uploading Image<p>';
              }
              elseif ($_GET['error']=="unsupported_format") {
                  echo '<p>Unsupported Image Format<p>';
              }
            }
          ?>

            <form action="includes/books.inc.php" method="post" enctype="multipart/form-data">
              <div class="f1">
                <input type="text" name="bid" autocomplete="off" required>
                <label for="bid" class="label-name">
                  <span class="content-name">Book ID</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="title" autocomplete="off" required>
                <label for="title" class="label-name">
                  <span class="content-name">E-Title</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="author" autocomplete="off" required>
                <label for="author" class="label-name">
                  <span class="content-name">Author Name</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="copies" autocomplete="off" required>
                <label for="copies" class="label-name">
                  <span class="content-name">Number of Copies</span>
                </label>
              </div>
              <div class="f1">
                <input type="textarea" name="description" autocomplete="off" rows="20" cols="50" required>
                <label for="description" class="label-name">
                  <span class="content-name">Description</span>
                </label>
              </div><br><br>
              <label for="img-file">
                <span>Book Cover</span>
              </label>
                <input type="file" name="img-file" required>
              <br><br>
              <!-- <label for="img-file">Book Cover</label>
              <input type="file" name="file" placeholder="Choose Image" required> -->
              <br>
              <button class="form btn4" type="submit" name="book-submit">Add New Book</button>
            </form>
          </div>
        </article>
      </main>


<?php
  require "footer.php"
?>
