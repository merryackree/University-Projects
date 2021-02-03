<?php 

/**
 * 
 */
class UserType extends Dbh
{
	
	protected function getUserType($uid){

		$query="SELECT utype FROM users WHERE id = '$uid'";
		$resultset = $this->connect()->query($query);
		$user = $resultset->fetch(PDO::FETCH_ASSOC);

		if ($user) {
			return $user['utype'];
		} 

	}
}



 ?>