<?php 

require "model/dbh.php";
require "model/membership_model.php";


$action = htmlspecialchars($_GET["action"]);
$userId = htmlspecialchars($_GET["id"]);

$membership = new Membership();

if ($action == "renew") {

	$membership->renewMembership($userId);
	header('Location: membership.php');
	
} else if($action == "cancel"){

	$membership->cancelMembership($userId);
	header('Location: membership.php');
}





 ?>