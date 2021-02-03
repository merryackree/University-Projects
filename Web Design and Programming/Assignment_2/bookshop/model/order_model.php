<?php 



Class Order extends Dbh{




	public function placeOrder($uid, $bookId) {

	   $date_array = getdate();
 		
	   $formated_date  = "";
	   $formated_date .= $date_array['year'] . "-";
	   $formated_date .= $date_array['mon'] . "-";
	   $formated_date .= $date_array['mday'];

		$query="INSERT INTO orders(user_id, book_id, order_date) VALUES (:uid, :bookId, :newDate)";
		$stmt = $this->connect()->prepare($query);
	    $stmt->bindValue(':uid', $uid);
        $stmt->bindValue(':bookId', $bookId);
        $stmt->bindValue(':newDate', $formated_date);
        $result = $stmt->execute();

        $query="UPDATE books SET copies = copies - 1 WHERE id = :bookId";
		$stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':bookId', $bookId);
        $result = $stmt->execute();


	}


	public function getMyOrders($uid){

		$query="SELECT order_date FROM orders WHERE user_id = '$uid'";
		$resultset = $this->connect()->query($query);
		$orders = $resultset->fetchAll(PDO::FETCH_ASSOC);

		if ($orders) {
			return $orders;
		} 
	}


	public function getMyBooks($uid){


		$query="SELECT * FROM books INNER JOIN orders ON books.id = orders.book_id WHERE orders.user_id = '$uid'";
		$resultset = $this->connect()->query($query);
		$books = $resultset->fetchAll(PDO::FETCH_ASSOC);

		if ($books) {
			return $books;
		} 
		


	}

}


 ?>