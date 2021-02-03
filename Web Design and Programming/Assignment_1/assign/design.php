<?php
	require "header.php"
?>

	 <main>
	 	<div class="container">
	 		<h2>Class Diagram</h2>
	 		<img src="img/class.png" alt="class diagram" class="img-responsive img-diagram">
	 		<h2>Physical Data Model</h2>
	 		<img src="img/physical.png" alt="Physical data model" class="img-responsive img-diagram">
	 		<h2>Items</h2>
	 		<table border="1">
	 			<tr>
	 				<td>id</td>
	 				<td>name</td>
	 				<td>description</td>
	 				<td>energy</td>
	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM items";
				$resultset = $conn->query($query);
				$items = $resultset->fetchAll();

				if($items){
					foreach ($items as $item) {
						echo "<tr>
							<td>{$item['id']}</td>
							<td>{$item['name']}</td>
							<td>{$item['description']}</td>
							<td>{$item['energy']}</td>
						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
	 		<h2>Categories</h2>
	 		<table border="1">
	 			<tr>
	 				<td>id</td>
	 				<td>name</td>
	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM category";
				$resultset = $conn->query($query);
				$categories = $resultset->fetchAll();

				if($categories){
					foreach ($categories as $category) {
						echo "<tr>
							<td>{$category['id']}</td>
							<td>{$category['name']}</td>
						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
	 		<h2>Meals</h2>
	 		<table border="1">
	 			<tr>
	 				<td>id</td>
	 				<td>name</td>
	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM meal";
				$resultset = $conn->query($query);
				$meals = $resultset->fetchAll();

				if($items){
					foreach ($meals as $meal) {
						echo "<tr>
							<td>{$meal['id']}</td>
							<td>{$meal['name']}</td>
						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
			<h2>Allergens</h2>
	 		<table border="1">
	 			<tr>
	 				<td>id</td>
	 				<td>product</td>

	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM allergen";
				$resultset = $conn->query($query);
				$allergens = $resultset->fetchAll();

				if($items){
					foreach ($allergens as $allergen) {
						echo "<tr>
							<td>{$allergen['id']}</td>
							<td>{$allergen['product']}</td>
						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
	 		<h2>Contains</h2>
	 		<table border="1">
	 			<tr>
	 				<td>allergen_id</td>
	 				<td>item_id</td>

	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM contains ORDER BY allergen_id";
				$resultset = $conn->query($query);
				$contains = $resultset->fetchAll();

				if($contains){
					foreach ($contains as $contain) {
						echo "<tr>
							<td>{$contain['allergen_id']}</td>
							<td>{$contain['item_id']}</td>

						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
	 		<h2>Item_category</h2>
	 		<table border="1">
	 			<tr>
	 				<td>category_id</td>
	 				<td>item_id</td>
	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM item_category ORDER BY category_id";
				$resultset = $conn->query($query);
				$itemscat = $resultset->fetchAll();

				if($itemscat){
					foreach ($itemscat as $itemcat) {
						echo "<tr>
							<td>{$itemcat['category_id']}</td>
							<td>{$itemcat['item_id']}</td>
						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
	 		<h2>Item_meal</h2>
	 		<table border="1">
	 			<tr>
	 				<td>meal_id</td>
	 				<td>item_id</td>
	 			</tr>
	 			<?php
	 			$query = "SELECT * FROM item_meal ORDER BY meal_id";
				$resultset = $conn->query($query);
				$itemsmeal = $resultset->fetchAll();
				$conn=NULL;

				if($itemsmeal){
					//loop over the array of students and display their name
					foreach ($itemsmeal as $itemmeal) {
						echo "<tr>
							<td>{$itemmeal['meal_id']}</td>
							<td>{$itemmeal['item_id']}</td>
						</tr>";
					}

					}
				else{
					echo "No records found";
				}

	 			 ?>
	 		</table>
		
	 	</div>
	 	<div class="container"><br><p>All of the information(description of items, names etc.) taken from <a href="https://www.mcdonalds.com/gb/en-gb/menu.html" style="color:blue">mcdonalds.com</a></p></div>
	 	<div class="container">Logo Icon made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	 </main>


<?php
	require "footer.php"
 ?>
