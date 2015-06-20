<?php
/**
 * Found at: Controllers/myPackage.php
 *
 * Handle requests to [URL]/Controllers/myPackage. Automagically handles CRUD (GET/POST/PUT/DELETE) for the xPDOObject class myPackage.
 */
// load controller 
class MyControllermyPackage extends modRestController {
  public $classKey = 'myPackage';
  public $defaultSortField = 'id';
  public $defaultSortDirection = 'ASC';
  public $defaultLimit = 25;

// pass your own verification code (basic modx auth shown below - but you could also set up auth token / secret / OAuth 2.0 etc
	public function verifyAuthentication() {

// if users is not logged in return false (401 not authorized)
    if (!$this->modx->user || $this->modx->user->id < 1) return false;
    return true;
  }
} 
// end modRestController


