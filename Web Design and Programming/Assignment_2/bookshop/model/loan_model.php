<?php 



Class Loan extends Dbh{




	public function placeLoan($uid, $bookId) {

		$query="SELECT membership FROM users WHERE id = '$uid'";
		$resultset = $this->connect()->query($query);
		$member = $resultset->fetch(PDO::FETCH_ASSOC);
		

		if ($member['membership'] == 1) {
			
		   $date_array = getdate();
	 		
		   $formated_date  = "";
		   $formated_date .= $date_array['year'] . "-";
		   $formated_date .= $date_array['mon'] . "-";
		   $formated_date .= $date_array['mday'];

		   $newDate = date('Y-m-d', strtotime($formated_date. ' + 0 days'));

		   $deadline = date('Y-m-d', strtotime($formated_date. ' + 14 days'));

			$query="INSERT INTO loans(user_id, book_id, date, deadline) VALUES (:uid, :bookId, :newDate, :deadline)";
			$stmt = $this->connect()->prepare($query);
		    $stmt->bindValue(':uid', $uid);
	        $stmt->bindValue(':bookId', $bookId);
	        $stmt->bindValue(':newDate', $newDate);
	        $stmt->bindValue(':deadline', $deadline);
	        $result = $stmt->execute();

	        $query="UPDATE books SET copies = copies - 1 WHERE id = :bookId";
			$stmt = $this->connect()->prepare($query);
	        $stmt->bindValue(':bookId', $bookId);
	        $result = $stmt->execute();


		} else {
			header("Location: bookdetails.php?id={$bookId}&error=expired_membership");
		}

	}


	public function getAllLoans(){

		$query="SELECT * FROM loans";
		$resultset = $this->connect()->query($query);
		$loans = $resultset->fetchAll(PDO::FETCH_ASSOC);

		if ($loans) {
			return $loans;
		} 
	}

	protected function getUserInfo($uid){

		$query="SELECT * FROM users WHERE id = '$uid'";
		$resultset = $this->connect()->query($query);
		$users = $resultset->fetch(PDO::FETCH_ASSOC);
		if ($users) {
			return $users;
		} 
	}


	public function getLoanedBooks($bookId){


		$query="SELECT * FROM books INNER JOIN loans ON books.id = loans.book_id WHERE loans.book_id = '$bookId'";
		$resultset = $this->connect()->query($query);
		$books = $resultset->fetch(PDO::FETCH_ASSOC);

		if ($books) {
			return $books;
		} 
	}

		public function getMyLoans($uid){

		$query="SELECT date, deadline FROM loans WHERE user_id = '$uid'";
		$resultset = $this->connect()->query($query);
		$loans = $resultset->fetchAll(PDO::FETCH_ASSOC);

		if ($loans) {
			return $loans;
		} 
	}


	public function getMyLoanedBooks($uid){


		$query="SELECT * FROM books INNER JOIN loans ON books.id = loans.book_id WHERE loans.user_id = '$uid'";
		$resultset = $this->connect()->query($query);
		$books = $resultset->fetchAll(PDO::FETCH_ASSOC);

		if ($books) {
			return $books;
		} 
		


	}

}


 ?>