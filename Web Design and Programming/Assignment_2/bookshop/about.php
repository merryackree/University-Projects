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
              echo '<h1 class="my-4"></h1>
                      <div class="list-group">';
            }
           ?>
        </div>
      </div>


      <div class="col-lg-9">
        <h3>Smith’s Second Hand Bookshop</h3>
<p>John Smith owns a second hand book shop on the High Street of a busy town.  The book shop buys and sells second hand books, but also has a small private library of rare books which he loans to local people. He has to keep a careful record of each loan and return. Before anyone can borrow any books they must register with the book shop and pay a deposit.  The depositis repaid when a person wishes to cease membership of the library if all the borrowed books have been returned in good condition.
When someone offers a book for sale John searches his catalogue of books to see if he already has a copy either in the library or for sale.  If so he checks how much he paid for the copy or copies he already has.  If he has several copies of the book already he may decline to buy the book, or offer a reduced price.  If John doesn’t already have a copy of the book he will offer to buy it, paying a reasonable price depending on its condition and rarity.</p><p> John has realised that the supply of second hand books locally has diminished and has decided to set up a web site where people can offer their books to John to buy. He realises that the seller of a book would have to input the condition of a book as well as the title and publication date.  The web application would have to decide what price to offer by retrieving the purchase and selling price of any previous copies of the book.  If the potential seller agrees to the price a transaction number would be displayed for the seller to include when sending the book.  John will paytheseller when the book is received.  If the application cannot calculate a price John willvalue the book himself.</p>


    
      </div>
    </div>


  </div>
</main>





 <?php
	require "footer.php";
?>
