<?php
  require "header.php"
 ?>


      <main>
        <article >
          <h1>Add a New Branch</h1>
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error']=="libidexists") {
                  echo '<p>Branch ID Already Exists<p>';
              }
              elseif ($_GET['error']=="sqlerror") {
                  echo '<p>SQL Error<p>';
              }
              elseif ($_GET['error']=="success"){
                echo '<p>Branch Added Successfuly<p>';
            }}
          ?>
          <div class="form">
            <form action="includes/branch.inc.php" method="post">
              <div class="f1">
                <input type="text" name="libid" autocomplete="off" required>
                <label for="libid" class="label-name">
                  <span class="content-name">Library ID</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="branch" autocomplete="off" required>
                <label for="branch" class="label-name">
                  <span class="content-name">Branch Name</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="address" autocomplete="off" rows="20" cols="50" required>
                <label for="details" class="label-name">
                  <span class="content-name">Branch Address</span>
                </label>
              </div>
              <br>
              <button type="submit" name="branch-submit">Add New Branch</button>
            </form>
          </div>
        </article>
      </main>


<?php
  require "footer.php"
?>
