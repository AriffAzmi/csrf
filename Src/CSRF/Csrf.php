<?php namespace CSRF;


use \CSRF\Interfaces\CsrfInterface;
/**
* 
*/
class Csrf implements CsrfInterface
{
 
	public function setToken($token=null) {

  		$expire = time() + (5 * 60);
  		$token = $token;
		
		setcookie('pfw_session', openssl_random_pseudo_bytes(64), $expire, "/");
		setcookie('X-PFW-TOKEN', $token, $expire, "/");

  		$_SESSION['csrfToken'] = [
  		 'token' => $token,
  		 'expire' => $expire
  		];
		
  		if (time() > $_SESSION['csrfToken']['expire']) {
  		 
  		 	$_SESSION['csrfToken'] = [
  		  		'token' => $token,
  		  		'expire' => $expire
  		 	];
  		}
 	}


 	public function validate($token=null) {
  
	  	if (isset($_SESSION['csrfToken'])) {
	  	 
		
	 		if ($token == $_SESSION['csrfToken']['token']) {
	  	  
	  	  		if (time() > $_SESSION['csrfToken']['expire']) {
	  	   
		  	   		return false;
		  	   		die();
		  	  	}
		  	  	else{
			
		  	   		return true;
		  	  	}
	 		}
		 	else{
			
		  	  	die("Token missmatch");
		 	}
		}
	}


	public function getToken() {
  		
  		self::generateToken();
		
  		return $_SESSION['csrfToken']['token'];
 	}

	public function generateToken() {
  
  		$token = base64_encode(openssl_random_pseudo_bytes(128));

  		self::setToken($token);
 	}
}

?>