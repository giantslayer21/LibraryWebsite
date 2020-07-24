<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>Library</title>
    <title></title>
    <link rel="stylesheet" href="style/style.css">
      <link rel="stylesheet" href="style/stylebooks.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
  <body>


    <header>
      <nav class="nav">

        <ul>
          <!-- <li><a href="#" class="logo"><img src="img/logo.png" alt="logo" height="40px"></a></li> -->
          <li><a href="index.php">Home</a> </li>
          <li><a href="branches.php">Branches</a> </li>
          <li><a href="books.php">Book List</a> </li>
          <li><a href="contact.php">Contact</a> </li>
          <?php
          if (isset($_SESSION['userUid'])) {
              echo '<li><a href="profile.php">Profile</a></li>';
              echo '<li class="logoutbutton"><form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" class="butt">Logout</button>
                    </form></li>';
              if ($_SESSION['acctype']==2) {
                echo '<li><a href="issue.php">Issue</a></li>';
              }
              if ($_SESSION['acctype']==3) {
                  echo '<li><a href="settings.php">Settings</a></li>';
              }
              if ($_SESSION['acctype']!=1) {
                echo '<li><a href="signup.php">Add User</a></li>';
              }
            }
            else {
              echo '<li class="form-inline"><form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username... " required>
                <input type="password" name="pwd" placeholder="Password... " required>
                <button type="submit" name="login-submit" class="butt">Login</button>
                </form></li>';
            }
           ?>
      </ul>
      </nav>
    </header>
  </body>
</html>
