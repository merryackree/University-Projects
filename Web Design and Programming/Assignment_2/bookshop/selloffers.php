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
<h4>My offers</h4>

    
            <table border="1">
              <tr>
                <th>Title</th>
                <th>Publication Year</th>
                <th>Condition</th>
                <th>Price Offer</th>
                <th>Status</th>
              </tr>
            <?php 

           if ($_SESSION['utype'] == 3){

              $offers = new ViewOffer();
              $offers->viewMyOffers($_SESSION['user_id']);


            } else {
              echo "You are not a seller!";
            }
          

       ?>

          </table>
   
    
      </div>
    </div>


  </div>
</main>





 <?php
	require "footer.php";
?>
