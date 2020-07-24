<?php
  require "header.php";
?>
<article >
  <h1>Contact</h1>
  <div class="form">
    <form action="#" method="post" >
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
        <input type="textarea" name="details" autocomplete="off" rows="20" cols="50" required>
        <label for="details" class="label-name">
          <span class="content-name">Details</span>
        </label>
      </div>
      <br>
      <button class="form btn" type="submit" name="contact-submit">Submit</button>
    </form>
  </div>
</article>

<?php
 require "footer.php";
?>
