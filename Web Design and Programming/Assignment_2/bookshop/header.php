<?php
 require "model/dbh.php";
 require "model/newUser.php";
 require "model/userLogin.php";
 require "model/books_model.php";
 require "view/viewBooks.php";
 require "view/viewNav.php";
 require "model/membership_model.php";
 require "view/viewUserinfo.php";
 require "model/order_model.php";
 require "view/viewOrders.php";
 require "model/loan_model.php";
 require "view/viewLoan.php";
 require "model/usertype_model.php";
 require "controller/cBuyer.php";
 require "view/viewUsertype.php";
 require "model/offer_model.php";
require "view/viewOffers.php";
require "view/viewMessages.php";

 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Smith's Bookshop</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="topheader">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Smith's Bookshop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php 
        if (isset($_SESSION['user_id'])) {
        $navbar = new Navbar($_SESSION['user_id'], $_SESSION['utype']);
        $navbar->showAuthNav();
        } else {
         $navbar = new Navbar(1, 1);
         $navbar->showUnauthNav();
        }


       ?>
      </div>
    </div>
  </nav>
</div>
