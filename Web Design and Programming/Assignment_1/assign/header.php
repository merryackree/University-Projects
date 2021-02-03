<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Assign</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="img/icon.png" alt="logo icon"></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="index.php"><span class="glyphicon glyphicon-home">Home</span></a></li>
          <li><a href="menu.php">Menu</a></li>
        </ul>
        <form action="results.php" method="get" class="navbar-form navbar-left">
  				<div class="form-group">
  					<input class="form-control" type="text" name="search" placeholder="Search" id="searchInput">
  					<button type="sybmit" class="btn btn-default">Search</button>
  				</div>
  			</form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="design.php">Design</a> </li>
        </ul>
      </div>
    </nav>
