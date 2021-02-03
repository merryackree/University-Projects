<?php 

Class Membership extends Dbh{



	public function getUserInfo($uid){

		$query="SELECT * FROM users WHERE id = '$uid'";
		$resultset = $this->connect()->query($query);
		$users = $resultset->fetchAll(PDO::FETCH_ASSOC);
		if ($users) {
			return $users;
		} 

	}

	public function renewMembership($uid){

		$query="UPDATE users SET membership = 1 WHERE id = '$uid'";
		$resultset = $this->connect()->query($query);

	}

	public function cancelMembership($uid){

		$query="UPDATE users SET membership = 0 WHERE id = '$uid'";
		$resultset = $this->connect()->query($query);

	}


}


 ?>