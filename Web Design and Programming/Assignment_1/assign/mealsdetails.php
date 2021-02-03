<?php
	require "header.php"
 ?>

  <main>
    <div class="container">
      <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $id = reset($queries);
        $query = "SELECT * FROM meal WHERE id=$id";
        $resultset = $conn->query($query);
        $meals = $resultset->fetchAll();
        foreach ($meals as $meal) {
          echo "<h2>{$meal['name']}</h2>";
        }
        echo "<img src='img/meal{$id}.jpg'>";

       $query = "SELECT * FROM items INNER JOIN item_meal ON items.id=item_meal.item_id WHERE item_meal.meal_id =:mealId";
       $prep_stmt=$conn->prepare($query);
       $prep_stmt->bindValue(':mealId',"{$id}");
       $prep_stmt->execute();
       $items=$prep_stmt->fetchall();

       $energy = 0;
       foreach ($items as $item) {
         $energy = $energy + $item['energy'];
       }
       echo "<h3>Total Energy: {$energy}kCal</h3>";

       echo "<h3>This meal contains:</h3>";
       echo "<div class='row'>";
       foreach ($items as $item) {
         echo "
         <div class='col-sm-4 meal-items'>
				 <a href='details.php?id={$item['id']}'>
         <div class='thumbnail'>
         <div class='caption'>
         <p style='text-align:center'>{$item['name']}</p>
         <p style='text-align:center'>{$item['energy']}kCal</p>
         </div>
         <img src='img/{$item['id']}.jpg' class='img-responsive'>
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
