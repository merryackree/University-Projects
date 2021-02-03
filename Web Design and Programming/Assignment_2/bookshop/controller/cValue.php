<?php 

require "../header.php";
/**
 * 
 */
class NewValue extends Offer
{
	
	protected $offer;
	protected $value;




	function __construct($offer, $value)
	{
		$this->offer=$offer;
		$this->value=$value;

	}

	public function setNewValue(){

		$this->updateOffer($this->offer, $this->value);
		header("Location: ../offers.php?success");


	}

	public function removeMyOffer(){
		$this->removeOffer($this->offer);
		header("Location: ../offers.php?remove=success");
	}

	public function removeSellerOffer(){
		$this->removeOffer($this->offer);
		header("Location: ../selloffers.php?remove=success");
	}

	public function acceptOffer(){

		$this->updateAcceptOffer($this->offer);
		header("Location: ../selloffers.php?accepted=success");

	}

	public function denyOffer(){

		$this->updateDenyOffer($this->offer);
		header("Location: ../selloffers.php?denied=success");

	}



}

if (isset($_POST['offer']) && isset($_POST['value'])) {

	$value = new NewValue($_POST['offer'], $_POST['value']);
	$value->setNewValue();
} 

if (isset($_POST['denied-offer'])) {
	
	$offer = new NewValue($_POST['denied-offer'], 0);
	$offer->removeMyOffer();
}

if (isset($_POST['seller-remove'])) {
	
	$offer = new NewValue($_POST['seller-remove'], 0);
	$offer->removeSellerOffer();
}

if (isset($_POST['accept'])) {
	
	$offer = new NewValue($_POST['accept'], 0);
	$offer->acceptOffer();
}

if (isset($_POST['deny'])) {
	
	$offer = new NewValue($_POST['deny'], 0);
	$offer->denyOffer();
}




 ?>