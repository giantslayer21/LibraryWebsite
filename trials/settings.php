<?php
    require "header.php";
    require 'includes/database.inc.php';
    if (isset($_POST['users-submit'])){
      $sql = "SELECT * from users;";
      $result= mysqli_query($conn2,$sql);
      $resCheck =mysqli_num_rows($result);
      if ($resCheck>0) {
        echo '<br><br><br><div class="detable"><table border="1">
        <tr>
        <th>uid</th>
        <th>name</th>
        <th>email</th>
        <th>numbooks</th>
        <th>phno</th>
        </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
          //$libid = $row['libid'];
          $uid = $row['uid'];
          $name= $row['name'];
          $email= $row['email'];
          $num_of_books = $row['numbooks'];
          $pno= $row['phno'];
          echo '
          <tr>
          <td>'.$row['uid'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['numbooks'].'</td>
          <td>'.$row['phno'].'</td>
          </tr>';

        }
        echo '</table></div>
        <div class="form">
          <form action="settings.php" method="post">
            <button type="submit" class="form btn">Back</button>
          </form>
        </div>';
      }
    }
    elseif (isset($_POST['staff-submit'])){
      $sql = "SELECT * from staff;";
      $result= mysqli_query($conn2,$sql);
      $resCheck =mysqli_num_rows($result);
      if ($resCheck>0) {
        echo '<br><br><br><div class="detable"><table border="1">
        <tr>
        <th>staffid</th>
        <th>name</th>
        <th>email</th>
        <th>phno</th>
        </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
          //$libid = $row['libid'];
          $staffid = $row['staffid'];
          $name= $row['name'];
          $email= $row['email'];
          $pno= $row['phno'];

          echo '
          <tr>
          <td>'.$row['staffid'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['phno'].'</td>
          </tr>';
        }
        echo '</table>
        </div>
        <div class="form">
          <form action="settings.php" method="post">
            <button type="submit" class="form btn">Back</button>
          </form>
        </div>';
      }
    }
    else {
      echo '<article>
        <h2>View Details</h2>
        <div class="form">
          <form action="settings.php" method="post">
            <button type="submit" class="btn1"name="users-submit">Users</button>
            <br><br>
            <button type="submit" class="btn2" name="staff-submit">Staff</button>
          </form>
        </div>
      </article>';
    }

?>
