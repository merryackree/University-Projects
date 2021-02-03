<?php 

/**
 * 
 */
class ViewUsertype extends User
{
	
	public function checkUserType($uid){

		$uType = new User();
		if ($uType->checkBuyer($uid)) {

			return true;
			
		} else {
			echo "You are not a buyer!";
			return false;
		}


	}
}


 ?>