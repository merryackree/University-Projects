<?php 

	/**
	 * 
	 */
	class ViewOrder extends Order
	{
		
		private $uid;

		function __construct($uid)
		{
			$this->uid=$uid;
		}

		public function myOrders(){

			$orders = new Order();
			$myOrders = $orders->getMyOrders($this->uid);
			$myBooks = $orders->getMyBooks($this->uid);

			for ($i=0; $i < sizeof($myBooks) ; $i++) { 
				echo "<tr>";
				echo "<td>".$myBooks[$i]['title']."</td>";
				echo "<td>".$myBooks[$i]['year']."</td>";
				echo "<td>".$myBooks[$i]['status']."</td>";
				echo "<td>£".$myBooks[$i]['price']."</td>";
				echo "<td>".$myOrders[$i]['order_date']."</td>";
				echo "</tr>";	
			}


		}



	}



 ?>