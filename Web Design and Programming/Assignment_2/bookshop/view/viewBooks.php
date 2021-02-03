<?php 

Class ViewBook extends Book{

	public function allBooks(){

		$books = $this->getAllBooks();

		foreach ($books as $book) {

			if (!$book['rare']) {

			echo "<div class='col-sm-4' style='text-align:center'>";
			echo "<a href='bookdetails.php?id={$book['id']}'><h4>".$book['title']."</h4>";
			echo '<img class="img-books img-responsive center-block img-thumbnail" src="img/'.$book["id"].'.jpg"></a>';
			echo "<p>Published in ".$book['year']."</p>";
			echo "<p>Condition: ".$book['status']."</p ><p>Price:<b> £".$book['price']."</b></p></div>";
			}
	
		}
	}

	public function rareBooks(){

		$books = $this->getAllBooks();

				foreach ($books as $book) {

					if ($book['rare']) {

				echo "<div class='col-sm-4' style='text-align:center'>";
				echo "<a href='bookdetails.php?id={$book['id']}'><h4>".$book['title']."</h4>";
				echo '<img class="img-books img-responsive center-block img-thumbnail" src="img/'.$book["id"].'.jpg"></a>';
				echo "<p>Published in ".$book['year']."</p>";
				echo "<p>Condition: ".$book['status']."</p><p><i>Rare Book</i></p></div>";
					}		
				}
	}

	public function bookDetails($param, $value){

		$book = $this->getSpecificBooks($param, $value);
			echo '<div class="row book-details"><div class="col-sm-3">';
			echo "<h4 style='text-align:center'>".$book[0]['title']."</h4>";
			echo '<img class="img-books center-block " src="img/'.$book[0]["id"].'.jpg"> </div>';
			echo '<div class="col-sm-9"><br><br>';
			echo "<p>Published in ".$book[0]['year']."</p>";
			echo "<p>Condition: ".$book[0]['status'];
			if ($book[0]['rare'] == 0) {
				echo "<p>Price:<b> £".$book[0]['price']."</b>";
				if ($book[0]['copies'] > 0) {
					echo "<h4>In stock</h4>";
					echo "<p>".$book[0]['copies']." copies available</p>";
					echo '<form action="order.php" method="get">
                      <button type="submit" name="order" value="'.$book[0]["id"].'">Purchase</button>
                      </form></div></div>';
				} else {
					echo "<h4>Not in stock</h4></div></div>";
				}

			} else {
				echo "<p>Rare Book</p>";
				if ($book[0]['copies'] > 0) {
					echo "<h4>In stock</h4>";
					echo "<p>".$book[0]['copies']." copies available</p>";
					echo '<form action="loan.php" method="get">
                      <button type="submit" name="book" value="'.$book[0]['id'].'">Borrow</button>
                      </form></div></div>';
				} else {
					echo "<h4>Not in stock</h4></div></div>";
				}

			}
	}


	public function confirmBuy($param, $value){

		$book = $this->getSpecificBooks($param, $value);

		echo "<h4>You are going to purchase</h4>";
		echo '<p><u>'.$book[0]['title'].'</u> ('.$book[0]['year'].')<p>';
		echo "<p>Total price: <b>£".$book[0]['price']."</b></p>";
		echo '<form action="myorders.php" method="get">
              <button type="submit" name="bookId" value="'.$book[0]["id"].'">Confirm</button>
               </form>';
        echo '<form action="bookdetails.php" method="get">
              <button type="submit" name="id" value="'.$book[0]["id"].'">Go back</button>
              </form>';

   }
}



 ?>