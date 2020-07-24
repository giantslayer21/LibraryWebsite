<?php
  require "header.php"
 ?>


      <main>
        <br><br><br>
        <article >
          <h1>Signup New Account</h1>
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error']=="invalidusernameandmail") {
                echo '<p>Invalid Username and E-Mail<p>';
              }
              elseif ($_GET['error']=="invalidmail") {
                  echo '<p>Invalid E-Mail<p>';
              }
              elseif ($_GET['error']=="invalidusername") {
                  echo '<p>Invalid Username<p>';
              }
              elseif ($_GET['error']=="mismatchedpwd") {
                  echo '<p>Missmatched Password<p>';
              }
              elseif ($_GET['error']=="sqlerror") {
                  echo '<p>SQL Error<p>';
              }
              elseif ($_GET['error']=="usertaken") {
                  echo '<p>User Already Exists<p>';
              }
              elseif ($_GET['error']=="success"){
                echo '<p>Signup Successful<p>';
            }}
          ?>
          <div class="form">
            <form action="includes/signup.inc.php" method="post" >
              <div class="f1">
                <input type="text" name="uid" autocomplete="off" required>
                <label for="uid" class="label-name">
                  <span class="content-name">Username</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="name" autocomplete="off" required>
                <label for="name" class="label-name">
                  <span class="content-name">Name</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="mail" autocomplete="off" required>
                <label for="mail" class="label-name">
                  <span class="content-name">E-mail</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="phno" autocomplete="off" required>
                <label for="phno" class="label-name">
                  <span class="content-name">Phone Number</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="address" autocomplete="off" required>
                <label for="address" class="label-name">
                  <span class="content-name">Address</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="pwd" autocomplete="off" required>
                <label for="pwd" class="label-name">
                  <span class="content-name">Password</span>
                </label>
              </div>
              <div class="f1">
                <input type="text" name="conf_pwd" autocomplete="off" required>
                <label for="conf_pwd" class="label-name">
                  <span class="content-name">Confirm Password</span>
                </label>
              </div>
              <br>
              <!-- <input type="textarea" name="details" autocomplete="off" rows="20" cols="50" required> -->
              <label for="dropdownlist">Account Type :</label>
                <select id="dropdownlist" name="accounttype" placeholder="User">
                  <option value="1">User</option>
                  <?php
                    if ($_SESSION['acctype']==3) {
                      echo '
                          <option value="2">Staff</option>
                          <option value="3">Admin</option>
                        ';
                    }
                    ?>
                </select>
              <br><br>
              <button class="form btn5" type="submit" name="signup-submit">Signup</button>
              <br><br>
            </form>
          </div>
        </article>
      </main>


<?php
  require "footer.php"
?>
