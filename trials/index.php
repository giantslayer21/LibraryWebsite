<?php
  require "header.php";
 ?>

<body>
   <div class="parallax1">
     <h1>Tired of reading on books your phones and tablets ?</h1>
     <h3><br><br>Love the feel of a good paperback ? </h3>
   </div>

   <div class="parallax3">
     <article style="opacity:90%">
       <h1 >For the love of Books !</h1>
       <p >Get in touch with us right away.</p>
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
           <button type="submit" name="contact-submit">Contact</button>
         </form>
       </div>
     </article>


    <div class="parallax2"></div>

</body>

      <main>
        <?php
          if (isset($_SESSION['userUid']))
          {
            /*if ($_SESSION['acctype']==1) {
              header("Location: index.php?login=success");
            }
            elseif ($_SESSION['acctype']==2) {
              header("Location: index.php?login=success");
            }
            elseif ($_SESSION['acctype']==3) {
              header("Location: index.php?login=success");
            }*/
          }
         ?>
      </main>


<?php
  require "footer.php";
?>
