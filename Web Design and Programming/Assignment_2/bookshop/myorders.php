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
        <h4>Order History</h4>

   
            <table border="1">
              <tr>
                <th>Title</th>
                <th>Publication Year</th>
                <th>Condition</th>
                <th>Price</th>
                <th>Order date</th>
              </tr>
            <?php 

            if (isset($_GET['bookId'])) {
              $bookId = htmlspecialchars($_GET["bookId"]);
              $order = new Order();
              $order->placeOrder($_SESSION['user_id'], $bookId);
            }

            $myOrder = new ViewOrder($_SESSION['user_id']);
            $myOrder->myOrders();
          

       ?>

          </table>
    
    
      </div>
    </div>


  </div>
</main>





 <?php
	require "footer.php";
?>
