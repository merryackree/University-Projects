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


    <div class="row">
            
            <?php 

      $allBooks = new ViewBook();
      $allBooks->allBooks();

       ?>


    </div>
    
      </div>
    </div>


  </div>
</main>





 <?php
	require "footer.php";
?>
