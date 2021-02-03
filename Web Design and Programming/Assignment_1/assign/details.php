<?php
	require "header.php"
 ?>

	 <main>
	 	<div class="container-fluid details-container">
				<div class="row">
					<div class="col-sm-4">
						<?php
							$queries = array();
 					 		parse_str($_SERVER['QUERY_STRING'], $queries);
 					 		$id = reset($queries);


					 $query = "SELECT * FROM items WHERE id=$id";
					 $resultset = $conn->query($query);
					 $item = $resultset->fetch();

						 echo "<h3>{$item['name']}</h3>";
						 echo "<img src='img/{$id}.jpg'>";
						 echo "<p class='details-desc'>{$item['description']}</p>";
						 

					 $query = "SELECT * FROM category INNER JOIN item_category ON category.id=item_category.category_id WHERE item_category.item_id =:itemId";
					 $prep_stmt=$conn->prepare($query);
					 $prep_stmt->bindValue(':itemId',"{$id}");
					 $prep_stmt->execute();
					 $cats=$prep_stmt->fetchall();
				 		echo "<h4 style='color: #2963A6'><i>Category:</i></h4>";
						foreach ($cats as $cat) {
							echo "<ul>";
							echo "<li style='font-size:17px; margin-top: -8px; margin-bottom:-5px;'>{$cat['name']}</li>";
							echo "</ul>";

						}			 
					echo "<p class='details-desc'><b style='color: #2963A6'>Energy:</b> {$item['energy']} kCal</p>";

					 $query = "SELECT * FROM allergen INNER JOIN contains ON allergen.id=contains.allergen_id WHERE contains.item_id =:itemId";
					 $prep_stmt=$conn->prepare($query);
					 $prep_stmt->bindValue(':itemId',"{$id}");
					 $prep_stmt->execute();
					 $allergens=$prep_stmt->fetchall();
					 	if (sizeof($allergens)>0) {
					 		echo "<h3 style='color: #2963A6'>!Allergens:</h3>";
							foreach ($allergens as $allergen) {
								echo "<ul>";
								echo "<li style='font-size:17px;'>{$allergen['product']}</li>";
								echo "</ul>";

							}

					 	}
					?>
					</div>
			 <div class="col-sm-5">
			 </div>
			 <div class="col-sm-3">
				 <h3>You may also like:</h3>
				 <?php
					  $query = "SELECT * FROM meal INNER JOIN item_meal ON meal.id=item_meal.meal_id WHERE item_meal.item_id =:itemId";
					  $prep_stmt=$conn->prepare($query);
	 					$prep_stmt->bindValue(':itemId',"{$id}");
	 					$prep_stmt->execute();
	 					$meals=$prep_stmt->fetchall();
	 					if (sizeof($meals) > 0) {
	 						foreach ($meals as $meal) {
	 							echo "
								<a href='mealsdetails.php?id={$meal['id']}'>
								<div class='thumbnail'>
								<div class='caption'>
								<p style='text-align:center'>{$meal['name']}</p>
								</div>
								<img src='img/meal{$meal['id']}.jpg' class='img-responsive'>

								</div>
								</a>";
	 						}
	 					} else {
							$sql = "SELECT DISTINCT category.id FROM category INNER JOIN item_category ON category.id=item_category.category_id WHERE item_category.item_id=$id";
							$rset = $conn->query($sql);
							$categories = $rset->fetchall();
								foreach ($categories as $category) {
									$query = "SELECT DISTINCT * FROM items INNER JOIN item_category ON items.id = item_category.item_id WHERE item_category.category_id = {$category['id']} AND items.id!=$id LIMIT 3";
			 					  $resultset = $conn->query($query);
			 				 	  $items = $resultset->fetchAll();
			 					  foreach ($items as $item) {
			 						 echo "
									 <a href='details.php?id={$item['id']}'>
									 <div class='thumbnail'>
									 <div class='caption'>
									 <p style='text-align:center'>{$item['name']}</p>
									 </div>
									 <img src='img/{$item['id']}.jpg' class='img-responsive'>

									 </div></a>";
			 					 }
								}

	 					}

				  ?>
			 </div>
			 </div>
		   </div>
	 	</div>
	 </main>

<?php
	require "footer.php"
 ?>
