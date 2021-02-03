<?php
	require "header.php"
 ?>
	 <main>
	 	<div class="container-fluid">
			<div class="row">
					<div class="col-sm-9">
						<div class="row">
			 		<?php
			 		$a = array();
			 		$b = array();
			 		$allergens = array();
			 		$categories = array();
			 		foreach ($_POST as $key => $value) {
                     $string = htmlspecialchars($key);

                     if (strlen($string) < 3) {
                     	array_push($categories, $string);
                     } else {
                     	array_push($allergens, $string);
                     }
                    }
					 foreach ($categories as $item) {


					 	$query="SELECT DISTINCT items.id FROM items INNER JOIN item_category ON items.id = item_category.item_id INNER JOIN category ON item_category.category_id=category.id WHERE category.id=:term";

						$prep_stmt=$conn->prepare($query);
						$prep_stmt->bindValue(':term',"{$item}");
						$prep_stmt->execute();
						$items=$prep_stmt->fetchall();
							if (sizeof($items) > 0) {
								foreach ($items as $ikey) {
									array_push($a, $ikey['id']);
								}

				 			}
			 		 }

			 		 $cresults = array_unique($a);

			 		 foreach ($allergens as $allergen) {
			 		 	$query="SELECT DISTINCT items.id FROM items INNER JOIN contains ON items.id=contains.item_id INNER JOIN allergen ON contains.allergen_id=allergen.id WHERE allergen.product=:term";

						$prep_stmt=$conn->prepare($query);
						$prep_stmt->bindValue(':term',"{$allergen}");
						$prep_stmt->execute();
						$items=$prep_stmt->fetchall();
							if (sizeof($items) > 0) {
								foreach ($items as $ikey) {
									array_push($b, $ikey['id']);
								}

				 			}
			 		 }

			 		 $aresults = array_unique($b);

			 		 if (sizeof($cresults) > 0) {
			 		 	$results=array_diff($cresults,$aresults);
			 		 } else {
			 		 	$query = "SELECT * FROM items";
						$resultset = $conn->query($query);
						$items = $resultset->fetchAll();
							foreach ($items as $item) {
								array_push($cresults, $item['id']);
							}
						$results=array_diff($cresults,$aresults);
				 	  }


			 			foreach ($results as $result) {
			 			$sql="SELECT DISTINCT items.id, items.name FROM items WHERE items.id=:term";

						$stmt=$conn->prepare($sql);
						$stmt->bindValue(':term',"{$result}");
						$stmt->execute();
						$fitems=$stmt->fetchall();
							if (sizeof($fitems) > 0) {
								foreach ($fitems as $key) {
									echo "<div class='col-sm-4'>
								<a href='details.php?id={$key['id']}'>
								<img src='img/{$key['id']}.jpg' class='img-responsive center-block img-thumbnail'>
								<p class='center-p'>{$key['name']}</p></a>

								</div>";
								}

				 			}
			 			}


			 		 ?>

				 	</div>
					</div>
					<div class="col-sm-3">
						<form action="index.php" method="post" class="form-tick">
							<h3>Allergens:</h3>
							<p>(Tick if you are allergic to any of these products)</p>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" name="Milk" id="milk">
							  <label class="form-check-label" for="milk">
							    Milk
							  </label>
							  </div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="Soya" id="soya">
							  <label class="form-check-label" for="soya">
							    Soya
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="Egg" id="egg">
							  <label class="form-check-label" for="egg">
							    Egg
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="Celery" id="celery">
							  <label class="form-check-label" for="celery">
							    Celery
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="Mustard" id="mustard">
							  <label class="form-check-label" for="mustard">
							    Mustard
							  </label></div>

							  <h3>Categories:</h3>

							<div class="form-check">
							  <input class="form-check-input" type="checkbox" name="3" id="chicken">
							  <label class="form-check-label" for="chicken">
							    Chicken Selects
							  </label>
							  </div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="1" id="breakfast">
							  <label class="form-check-label" for="breakfast">
							    Breakfast
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="2" id="burgers">
							  <label class="form-check-label" for="burgers">
							    Burgers
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="4" id="wraps">
							  <label class="form-check-label" for="wraps">
							    Wraps & Salads
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="5" id="side">
							  <label class="form-check-label" for="side">
							    Fries & Sides
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="6" id="save">
							  <label class="form-check-label" for="save">
							    Saver Menu
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="7" id="veg">
							  <label class="form-check-label" for="veg">
							    Vegetarian
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="8" id="dess">
							  <label class="form-check-label" for="dess">
							    Desserts
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="9" id="drinks">
							  <label class="form-check-label" for="drinks">
							    Milkshakes & Cold Drinks
							  </label></div>
							  <div class="form-check">
							  <input class="form-check-input" type="checkbox" name="10" id="hot">
							  <label class="form-check-label" for="hot">
							    McCafe & Hot Drinks
							  </label></div>
							  <button type="sybmit" class="btn btn-primary" id="filter-btn">Filter</button>

						</form>
					</div>
			</div>

	 	</div>
	 </main>

<?php
	require "footer.php";
?>
