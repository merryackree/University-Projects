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
                <th>Seller</th>
                <th>My offer</th>
                <th>Status</th>
              </tr>
            <?php 

            if ($_SESSION['utype']){

              $offers = new ViewOffer();
              $offers->viewAllOffers();


            } else {
              echo "You are not an owner!";
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
