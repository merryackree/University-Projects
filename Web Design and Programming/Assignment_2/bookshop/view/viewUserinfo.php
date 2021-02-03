<?php 

Class UserInfo extends Membership{

	private $uid;
	private $utype;


		public function __construct($uid, $utype){
			$this->uid=$uid;
			$this->utype=$utype;
		}


	public function userInfo(){

		$users = $this->getUserInfo($this->uid);

		foreach ($users as $user) {
			echo '<div class="info">';
			echo "<p>Username: ".$user['username'];
			echo "</p>";
			echo "<p>Full Name: ".$user['fname']." ".$user['lname'];
			echo "</p>";
			echo "<p>Phone Number: ".$user['number'];
			echo "</p>";
			echo "<p style='display: inline'>Membership: </p>";
			if ($user['membership'] == 1) {
				echo "<p style='color:green; display: inline'>Active</p></div><br>";
				echo "<a class='btn btn-cancel' href='updateMembership.php?action=cancel&id={$user['id']}'>Cancel Membership</a>";
				// echo '<input type="button" value="Cancel Membership">';
			} else {
				echo "<p style='color:red; display: inline'>Expired</p></div><br>";
				echo "<a class='btn btn-renew' href='updateMembership.php?action=renew&id={$user['id']}'>Renew Membership</a>";
				// echo '<input type="button" value="Renew Membership">';
			}
			
			
		}


	}
}



 ?>