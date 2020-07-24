<?php
    require "header.php";
    require 'includes/database.inc.php';
?>

<article>
  <h1>Issue</h1>
  <?php
    if (isset($_GET['error'])) {
      if ($_GET['error']=="cannot_issue_more_books") {
        echo '<p>Cannot issue more books !<p>';
      }
      elseif ($_GET['error']=="invalid_bookid") {
          echo '<p>Invalid Book ID !<p>';
      }
      elseif ($_GET['error']=="invalid_user") {
          echo '<p>Invalid Username !<p>';
      }
      elseif ($_GET['error']=="sqlerror") {
          echo '<p>SQL Error !<p>';
      }
      elseif ($_GET['error']=="no_books_available") {
          echo '<p>No Books Available Currently !<p>';
      }
      elseif ($_GET['error']=="issue_success"){
        echo '<p>Issue Successful !<p>';
      }
      elseif ($_GET['error']=="return_success"){
        echo '<p>Return Successful !<p>';
    }}
  ?>
  <div class="form">
    <form action="includes/issue.inc.php" method="post">
      <div class="f1">
        <input type="text" name="uid" autocomplete="off" required>
        <label for="uid" class="label-name">
          <span class="content-name">Username</span>
        </label>
      </div>
      <div class="f1">
        <input type="text" name="bid" list='bookselect' required>
        <label for="bid" class="label-name">
          <span class="content-name">Book ID</span>
        </label>
        <datalist id="bookselect">
          <?php
          $sql = "SELECT bookid from books;";
          $result= mysqli_query($conn2,$sql);
          $resCheck =mysqli_num_rows($result);
          if ($resCheck>0)
          { while($row = mysqli_fetch_assoc($result))
            {
                $bookid = $row['bookid'];
                echo '<option value='. htmlspecialchars($bookid) .'>';
            }
          }
          else {
            echo "Sorry, there seems to have been an error.. :p";
          }
          ?>
        </datalist>
      </div>
      <br>
      <button type="submit" class="btn1"name="issue-submit">Issue</button>
      <br><br>
      <button type="submit" class="btn2" name="return-submit">Return</button>
    </form>
  </div>
</article>
