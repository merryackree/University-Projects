<?php 

	/**
	 * 
	 */
	class ViewLoan extends Loan
	{
		
		private $uid;

		function __construct($uid)
		{
			$this->uid=$uid;
		}

		public function myLoans(){

			$loans = new Loan();
			$myLoans = $loans->getMyLoans($this->uid);
			$myBooks = $loans->getMyLoanedBooks($this->uid);

			for ($i=0; $i < sizeof($myBooks) ; $i++) { 
				echo "<tr>";
				echo "<td>".$myBooks[$i]['title']."</td>";
				echo "<td>".$myBooks[$i]['year']."</td>";
				echo "<td>".$myBooks[$i]['status']."</td>";
				echo "<td>".$myLoans[$i]['date']."</td>";
				echo "<td>".$myLoans[$i]['deadline']."</td>";
				echo "</tr>";	
			}
		}

		public function allLoans(){

			$loan = new Loan();
			$loans = $loan->getAllLoans();



			for ($i=0; $i < sizeof($loans) ; $i++) { 

				$book = $loan->getLoanedBooks($loans[$i]['book_id']);
				$user = new Loan();
				$userInfo = $user->getUserInfo($loans[$i]['user_id']);
				
				echo "<tr>";
				echo "<td>".$book['title']."</td>";
				echo "<td>".$book['year']."</td>";
				echo "<td>".$book['status']."</td>";
				echo "<td>".$loans[$i]['date']."</td>";
				echo "<td>".$loans[$i]['deadline']."</td>";
				echo "<td>".$userInfo['fname']." ".$userInfo['lname']."<br>Phone:".$userInfo['number']."</td>";
				echo "</tr>";	


			}

			// $books = $loan->getAllLoanedBooks();



		}



	}



 ?>