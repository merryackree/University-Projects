<?php 

	/**
	 * 
	 */
	class ViewOffer extends Offer
	{
		
		

		public function viewAllOffers(){

			$offers = $this->getAllOffers();
			


			for ($i=0; $i < sizeof($offers) ; $i++) { 

				$seller = $this->getUserInfo($offers[$i]['user_id']);

				echo "<tr>";
				echo "<td>".$offers[$i]['title']."</td>";
				echo "<td>".$offers[$i]['year']."</td>";
				echo "<td>".$offers[$i]['status']."</td>";
				echo "<td>".$seller['fname']." ".$seller['lname']."<br>Phone: ".$seller['number']."</td>";
				if ($offers[$i]['price_offer'] == 0) {
				echo "<td>Not yet valued</td>";
				} else {
				echo "<td><b>£".$offers[$i]['price_offer']."</b></td>";
				}
				if ($offers[$i]['accepted'] == 0) {
				echo "<td class='pending'>Pending</td>";
				} else if ($offers[$i]['accepted'] == 1){
				echo "<td class='acc'>Deal Accepted</td>";
				} 
				else if ($offers[$i]['accepted'] == 4){
				echo "<td class='pending'>Waiting for Seller</td>";
				}
				else {
				echo "<td class='denied'>Deal Denied</td>";
				}
				if ($offers[$i]['price_offer'] == 0) {
					echo '<td><form action="controller/cValue.php" method="post">
				<input type="text" name="value" placeholder="My price(£)">
				<button type="submit" name="offer" value="'.$offers[$i]['id'].'">Offer</button>

				</form></td>';
				echo '<td><form action="controller/cValue.php" method="post">
				
				<button type="submit" name="denied-offer" value="'.$offers[$i]['id'].'">Deny offer</button>

				</form></td>';
				} else if($offers[$i]['accepted'] != 1){
					echo '<td><form action="controller/cValue.php" method="post">
				
				<button type="submit" name="denied-offer" value="'.$offers[$i]['id'].'">Deny offer</button>

				</form></td>';
				}
				echo "</tr>";	
			}


		}

		public function viewMyOffers($uid){


			$offers = $this->getMyOffers($uid);
			


			for ($i=0; $i < sizeof($offers) ; $i++) { 


				echo "<tr>";
				echo "<td>".$offers[$i]['title']."</td>";
				echo "<td>".$offers[$i]['year']."</td>";
				echo "<td>".$offers[$i]['status']."</td>";
				if ($offers[$i]['price_offer'] == 0) {
				echo "<td>Not yet valued</td>";
				} else {
				echo "<td><b>£".$offers[$i]['price_offer']."</b></td>";
				}
				if ($offers[$i]['accepted'] == 0) {
				echo "<td class='pending'>Pending</td>";
				echo '<td><form action="controller/cValue.php" method="post">
				
				<button type="submit" name="seller-remove" value="'.$offers[$i]['id'].'">Remove</button>

				</form></td>';
				} else if ($offers[$i]['accepted'] == 1){
				echo "<td class='acc'>Deal Accepted</td>";
				} 
				else if ($offers[$i]['accepted'] == 4){
				echo "<td class='pending'>Waiting for Seller</td>";
				}
				else {
				echo "<td class='denied'>Deal Denied</td>";
				}
				if($offers[$i]['price_offer'] != 0){
				echo '<td><form action="controller/cValue.php" method="post">
				
				<button type="submit" name="accept" value="'.$offers[$i]['id'].'">Accept Offer</button>

				</form></td>';
				echo '<td><form action="controller/cValue.php" method="post">
				
				<button type="submit" name="deny" value="'.$offers[$i]['id'].'">Deny Offer</button>

				</form></td>';
				}
				echo "</tr>";	
		}



	}

}

 ?>