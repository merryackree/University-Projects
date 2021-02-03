<?php 



/**
 * 
 */
	Class Navbar {
		
		protected $user_id;
		protected $userType;


		public function __construct($uid, $utype){
			$this->user_id=$uid;
			$this->userType=$utype;
		}


		public function showAuthNav(){		
				
		echo '<ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Browse Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controller/cLogout.php">Log out</a>
          </li>
        </ul>';
				
		}


		public function showUnauthNav(){

			echo '         <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Browse Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>';


		}

		public function showAccount(){

			if ($this->userType == 1) {

				echo '
				  <h1 class="my-4">My account</h1>
                  <div class="list-group">
		          <a href="manageloans.php" class="list-group-item">Manage Loans</a>
		          <a href="offers.php" class="list-group-item">View Offers</a>';
			} else if ($this->userType == 2){
				echo '
				  <h1 class="my-4">My account</h1>
                  <div class="list-group">
				  <a href="membership.php" class="list-group-item">Manage Membership</a>
		          <a href="borrow.php" class="list-group-item">Borrow Rare Books</a>
		          <a href="myorders.php" class="list-group-item">My orders</a>
		          <a href="loan.php" class="list-group-item">My loans</a>';

			} else if ($this->userType == 3) {
				echo '
				   <h1 class="my-4">My account</h1>
                  <div class="list-group">
				  <a href="sell.php" class="list-group-item">Sell Books</a>
		          <a href="selloffers.php" class="list-group-item">My offers</a>';
			} 


		}

	}





 ?>