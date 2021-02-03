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
              echo '<h1 class="my-4">Welcome, guest!</h1>
                      <div class="list-group">';
            }
           ?>
        </div>
      </div>


      <div class="col-lg-9">


            
            <?php 
            if (isset($_SESSION['user_id'])) {
              $checkUser = new ViewUsertype();
            if ($checkUser->checkUserType($_SESSION['user_id'])) {
              $bookId = htmlspecialchars($_GET["order"]);
              $confirm = new ViewBook();
              $confirm->confirmBuy("id", $bookId);
            }
            } else {
              echo "<p style='font-size: 18px'>You are not authorized, please <a href='login.php'>Log in</a> or <a href='register.php'>Sign up</a></p>";
            }
            

            
      

       ?>


    
      </div>
    </div>


  </div>
</main>





 <?php
  require "footer.php";
?>
