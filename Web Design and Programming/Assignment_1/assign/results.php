<?php
	require "header.php"
 ?>

	 <main>
	 	<div class="container-fluid">
			<div class="row">
					<div class="col-sm-9">
						<div class="row">
			 		<?php

			 		$item = $_GET['search'];
		 			if (strlen($item)>2) {
			 		$query="SELECT DISTINCT items.id, items.name FROM items INNER JOIN item_category ON items.id = item_category.item_id INNER JOIN category ON
			 		item_category.category_id=category.id WHERE category.name LIKE :term OR items.name LIKE :term";
					$prep_stmt=$conn->prepare($query);
					$prep_stmt->bindValue(':term',"%{$item}%");
					$prep_stmt->execute();
					$items=$prep_stmt->fetchall();
					$itemsLenghth = sizeof($items);
					if (sizeof($items) > 0) {
						echo "<div class='alert alert-success' role='alert'>Your request '{$item}' has matched {$itemsLenghth} results</div>";
						foreach ($items as $key) {
							echo "<div class='col-sm-4'>
							<a href='details.php?id={$key['id']}'>
							<img src='img/{$key['id']}.jpg' class='img-responsive img-thumbnail center-block'>
							<p class='center-p'>{$key['name']}</p></a>

							</div>";
						}
					} else {
						echo "<div class='alert alert-info' role='alert'>Nothing Found Sorry, no records have matched your request '{$item}'</div>";
					}

			 		 } else if (strlen($item) < 3){
			 			 echo "<div class='alert alert-warning' role='alert'>You have to type at least 3 characters!</div>";
					 } else {
						 echo "<div class='alert alert-danger' role='alert'>The search field is empty!</div>";
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
							  <button type="sybmit" class="btn btn-primary">Filter</button>

						</form>
					</div>
			</div>

	 	</div>
	 </main>


<?php
	require "footer.php"
 ?>
