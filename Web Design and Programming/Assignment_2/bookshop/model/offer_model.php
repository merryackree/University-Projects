<?php 

/**
 * 
 */
	Class Offer extends Dbh
	{
		

	 public function placeOffer($uid, $title, $year, $status) {

	    $query="SELECT * FROM books";
		$resultset = $this->connect()->query($query);
		$books = $resultset->fetchAll(PDO::FETCH_ASSOC);
		$price = 0;
		$acc = 0;

		foreach ($books as $book) {
			if ($book['title'] == $title && $book['year'] == $year) {

				$query="SELECT price, status FROM books WHERE title = '$title'";
				$resultset = $this->connect()->query($query);
				$book = $resultset->fetch(PDO::FETCH_ASSOC);

				$bookPrice = $this->autoPrice($book['status']);
				$offerPrice = $this->autoPrice($status);

				if ($bookPrice == $offerPrice) {
					$price = $book['price'];
				} else {
					$price = $offerPrice * $book['price'] / $bookPrice;
					$price = round($price, 2);

				}

				$acc = 4;

			}
		}

		$query="INSERT INTO offers(user_id, title, year, status, price_offer, accepted) VALUES (:uid, :title, :year, :status, :price, :acc)";
		$stmt = $this->connect()->prepare($query);
	    $stmt->bindValue(':uid', $uid);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':year', $year);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':acc', $acc);
        $result = $stmt->execute();

        if ($result) {
        	echo "succes";
        } else {
        	echo "sql error";
        }
	}


	private function autoPrice($status){

			switch ($status) {
	    case "new":
	        return 1.2;
	        break;
	    case "very good":
	        return 1;
	        break;
	    case "good":
	        return 0.8;
	        break;
	    case "average":
	        return 0.65;
	        break;
	    case "poor":
	        return 0.5;
	        break;
	    default:
	        return 1;
	  }

	}

	public function getAllOffers(){

		$query="SELECT * FROM offers";
		$resultset = $this->connect()->query($query);
		$offers = $resultset->fetchAll(PDO::FETCH_ASSOC);
		if ($offers) {
			return $offers;
		} 
	}

		public function getMyOffers($uid){

		$query="SELECT * FROM offers WHERE user_id = {$uid}";
		$resultset = $this->connect()->query($query);
		$offers = $resultset->fetchAll(PDO::FETCH_ASSOC);
		if ($offers) {
			return $offers;
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

	protected function updateOffer($offer, $value){

		$query="UPDATE offers SET price_offer = {$value}, accepted = 4 WHERE id = {$offer}";
		$resultset = $this->connect()->query($query);

	}

	protected function updateAcceptOffer($offer){

	$query="UPDATE offers SET accepted = 1 WHERE id = {$offer}";
	$resultset = $this->connect()->query($query);

	}

	protected function updateDenyOffer($offer){

	$query="UPDATE offers SET accepted = 2 WHERE id = {$offer}";
	$resultset = $this->connect()->query($query);

	}

	protected function removeOffer($offer) {

		$query="DELETE FROM offers WHERE id = {$offer}";
		$resultset = $this->connect()->query($query);
	}



}

 ?>	
