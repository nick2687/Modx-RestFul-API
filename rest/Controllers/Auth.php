<?php
/**
 * Found at: Controllers/Auth.php
 *
 * Handle requests to [URL]/Controllers/Auth. 
 * Automagically handles Basic Authentication via a GET request
 * Reccomended to only pass over https
 */
class MyControllerPrefixAuth extends modRestController {
  
// load modUser class for authentication
	public $classKey = 'modUser';

// Force authentication check
  public function verifyAuthentication() {
// Only allow GET requests to the AUTH controller - otherwise throw error
  if ($this->request->method != 'get') Throw new Exception('Method Not Allowed', 405); 

// Check if users is currently logged in, if so and user passes the "?logout" URL Param then run the logout processor (log them out)
	if ($this->modx->user || $this->modx->user->id >= 1) { 
  	if ($_GET['logout']) {	
      $this->modx->runProcessor('security/logout',array(
        'login_context' => $this->getProperty('loginContext', $this->modx->context->get('key')),
        'add_contexts' => $this->getProperty('contexts',''),
      ));
    } 
	}
// If user is not logged in & passes a username & password (?username=username&password=password) preform basic auth by running login processor    	
	if (!$this->modx->user || $this->modx->user->id < 1) {  
  	$c = array(		
    	'username' => $_GET['username'],
    	'password' => $_GET['password'],
  	);
	  $this->modx->runProcessor('security/login',$c);
  }
//Do a final check to see if the users is logged in or not. Return True or False to complete verifyPermissionsCheck
  if (!$this->modx->user || $this->modx->user->id < 1) return false;  
    return true;
  }

  protected function prepareListQueryBeforeCount(xPDOQuery $c) { 
    
    $c->where(array(
        'id' => $this->modx->user->id
    ));
// Subseqent requests to /Auth after users is logged in will return basic user info

 		return $c;	
  }  
} 

