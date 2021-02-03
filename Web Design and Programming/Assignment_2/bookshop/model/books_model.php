<?php 



Class Book extends Dbh{




	public function getAllBooks(){

		$query="SELECT * FROM books";
		$resultset = $this->connect()->query($query);
		$books = $resultset->fetchAll(PDO::FETCH_ASSOC);
		if ($books) {
			return $books;
		} 
		
	}

	public function getSpecificBooks($param, $value) {

		$query="SELECT * FROM books WHERE {$param} = {$value}";
		$resultset = $this->connect()->query($query);
		$books = $resultset->fetchAll(PDO::FETCH_ASSOC);
		if ($books) {
			return $books;
		} 
	}

}


 ?>