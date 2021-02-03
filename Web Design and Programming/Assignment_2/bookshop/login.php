<?php
require "header.php";
 ?>

  <main>
    <div class="container">

      <div class="row">

        <div class="col-lg-3">



        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <?php 

          if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET["error"]);
            $message = new Message();
            $message->viewError($error);

          }
           ?>

           <h4>Log in</h4><br>

          <form action="controller/cLogin.php" method="post">
          <input type="text" name="username" id="login-input" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <button type="submit" name="login-submit">Login</button>
          </form>
          


        </div>
  </main>






<?php
require "footer.php";
?>
