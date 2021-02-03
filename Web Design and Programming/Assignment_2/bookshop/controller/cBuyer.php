<?php 

	/**
	 * 
	 */
	class User extends UserType
	{
		
   

		public function checkBuyer($uid) {

			$userType = $this->getUserType($uid);
			
			if ($userType == 2) {
				return true;
			} else {
				return false;
			}



		}
	}



 ?>