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
<h4>My Loans</h4>

    
            <table border="1">
              <tr>
                <th>Title</th>
                <th>Publication Year</th>
                <th>Condition</th>
                <th>Loaned Date</th>
                <th>Deadline</th>
              </tr>
            <?php 

            if (isset($_GET['book'])) {
              $bookId = htmlspecialchars($_GET["book"]);
              $loan = new Loan();
              $loan->placeLoan($_SESSION['user_id'], $bookId);
            }

            $myLoan = new ViewLoan($_SESSION['user_id']);
            $myLoan->myLoans();
          

       ?>

          </table>
    
    
      </div>
    </div>


  </div>
</main>





 <?php
	require "footer.php";
?>
