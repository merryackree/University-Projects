<?php 

require "../header.php";
/**
 * 
 */
class NewOffer extends Offer
{
	
	protected $uid;
	protected $title;
	protected $status;
	protected $year;



	function __construct($uid, $title, $year, $status)
	{
		$this->uid=$uid;
		$this->title=$title;
		$this->year=$year;
		$this->status=$status;

	}

	public function checkEmptyFields() {

		if (empty($this->title) || empty($this->year) || $this->status == "0") {
    	header("Location: ../sell.php?error=emptyfields");
    	exit();
    	} else {
    		$this->placeOffer($this->uid, $this->title, $this->year, $this->status);
    		header("Location: ../sell.php?success");
    		exit();
    	}

	}




}

if (isset($_SESSION['user_id']) && isset($_POST['title']) && isset($_POST['year']) && isset($_POST['status'])) {

	$offer = new NewOffer($_SESSION['user_id'], $_POST['title'], $_POST['year'], $_POST['status']);
	$offer->checkEmptyFields();
} else {
   header("Location: ../sell.php?error=emptyfields");
}






 ?>