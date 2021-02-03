<?php 

class UserLogin extends Dbh {

	protected $username;
	protected $password;

	public function __construct($username, $password) {
		$this->username=$username;
		$this->password=$password;
	}

	public function login(){

		session_start();

		 $sql = "SELECT id, username, password, utype FROM users WHERE username = :username";
		 $stmt = $this->connect()->prepare($sql);

		 $stmt->bindValue(':username', $this->username);
		 $stmt->execute();

		 $user = $stmt->fetch(PDO::FETCH_ASSOC);
		 if($user === false){

         header('Location: ../login.php?error=incorrect_combination');
	     } else {

	     	// $validPassword = password_verify($this->password, $user['password']);

	     	if($this->password == $user['password']){
            
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['utype'] = $user['utype'];
 
            
            
	            header('Location: ../index.php');
	            exit;
	            
	        } else{
	            header('Location: ../login.php?error=incorrect_combination');
	            
	        }
    

	     }

	}

}


 



