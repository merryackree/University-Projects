<?php 


/**
 * 
 */
class Message 
{
	
	public function viewError($error){

		if ($error=='emptyfields') {

          echo '<div class="alert alert-danger" role="alert">
				  Please fill in all the forms!
				</div>';
              
        } else if ($error == 'passwordcheck') {
        	echo '<div class="alert alert-warning" role="alert">
					  The passwords dont match!
					</div>';
        } else if ($error == 'incorrect_combination'){
        	  echo '<div class="alert alert-warning" role="alert">
					 Incorect Combination!
					</div>';
        }

	}

	public function viewSignup($message){

		if (htmlspecialchars($message == 'success')) {
			echo '<div class="alert alert-success" role="alert">You have been successfully registered!</div>';
		}
		
	}


}





 ?>