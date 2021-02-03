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


    <h3>Sell your books to bookstore</h3>

    <h5>Place your offer:</h5>
    <p>(Place your enquiry and wait for a price offer from bookstore owner)</p>
    <p>Attention! In case the bookstore has a similar book, the price will be offered automatically.</p>

    <form  action="controller/cOffers.php" method="post">
       <select name="status" class="selectType">
            <option value="0" selected disabled hidden>Book's Condition</option>
            <option value="new">New</option>
            <option value="very good">Very good</option>
            <option value="good">Good</option>
            <option value="average">Average</option>
            <option value="poor">Poor</option>
          </select>
      <input type="text" name="title" placeholder="Book's Title"><br>
      <input type="text" name="year" placeholder="Publication Year"><br>

      <button type="submit" name="signup-submit">Place enquiry</button>

    </form>
    
      </div>
    </div>


  </div>
</main>





 <?php
	require "footer.php";
?>
