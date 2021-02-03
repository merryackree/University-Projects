<?php
require "header.php";
 ?>

  <main>
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
        <?php 
          if (isset($_SESSION['utype'])) {
            $account = new Navbar($_SESSION['user_id'], $_SESSION['utype']);
            $account->showAccount();
            }  else {
              echo '<h1 class="my-4">Sign up</h1>
                      <div class="list-group">';
            }
           ?>

         </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <?php 

          if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET["error"]);
            $message = new Message();
            $message->viewError($error);

          }
          
          if (isset($_GET['signup'])) {
            $success = new Message();
            $success->viewSignup($_GET['signup']);
          }


           ?>
          <form class="form-signup" action="controller/cRegister.php" method="post">
          <select name="utype" class="selectType">
            <option value="0" selected disabled hidden>User Type</option>
            <option value="2">Buyer</option>
            <option value="3">Seller</option>
          </select>
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwdRepeat" placeholder="Repeat password">
          <input type="text" name="fName" placeholder="First Name">
          <input type="text" name="lName" placeholder="Last Name">
          <input type="tel" name="number" placeholder="Telephone number">
          <button type="submit" name="signup-submit">Create your account</button>
        </form><br>
        <p class="parag">By creating an account, you agree to our  <a href="#">Terms and Conditions</a></p>
          <p class="parag">Already have an account?  <a href="login.php">Login</a></p>






      </div>
    </div>
  </main>






<?php
require "footer.php";
?>
