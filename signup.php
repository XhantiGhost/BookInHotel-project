<?php

require_once "index.php";

?>

<main>
    <div>
     <section class="section">
      <h1>Sign Up</h1>
      <?php 
      if(isset($_POST['error'])) {
          if ($_POST['error'] == "emptyfields") {
              echo '<p class="signerror"> Fill in all fields!</p>';
          }
          elseif ($_POST['invaildfields']) {
              echo '<p class="signerror"> Fill in all fields!</p>';
          } 
          elseif ($_POST['invaildfields']) {
            echo '<p class="signerror"> Fill in all fields!</p>';
        } 
        elseif ($_POST['usernameTaken&mail']) {
            echo '<p class="signerror"> Already taken!</p>';
        }

      }

      else {
          
          echo '<p class="signsuccess">Signup successful!</p>';
      }

      ?>
       <form form-signup action="signup.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="pass" placeholder="Password">
        <input type="password" name="pass12" placeholder="Repeat Password">
        <button type="submit" name="signup-submit">Signup</button>
       </form>
    </section>
   </div>
  </main>