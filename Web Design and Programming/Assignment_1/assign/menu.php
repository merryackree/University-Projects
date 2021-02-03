<?php
	require "header.php"
 ?>

	 <main>
	 	<div class="container text-center">
			<div class="row">
				<h2>Meals</h2>
				<?php
					$query="SELECT * FROM meal";
					$resultset = $conn->query($query);
					$meals = $resultset->fetchAll();
						foreach ($meals as $meal) {
							echo "<div class='col-sm-4'>
						  	<a href='mealsdetails.php?id={$meal['id']}'>
								<div class='thumbnail'>
								<img src='img/meal{$meal['id']}.jpg' class='img-responsive center-block'>
								<div class='caption'>
								<p style='text-align:center'>{$meal['name']}</p>
								</div>
								</div>
								</a>
								</div>";
						}

				 ?>

			</div>

	 	</div>
	 </main>

<?php
	require "footer.php"
 ?>
