<?php
// Initialize MODX
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');

// Pull in up any service classes or custom packages (models) you will need
$path = MODX_CORE_PATH . 'components/MyPackage/';
$modx->addPackage('MyPackageClass', $path . 'model/','MyTablePrefix_');

// Load the modRestService class and pass it some basic configuration

$rest = $modx->getService('rest', 'rest.modRestService', '', array(
    'basePath' => dirname(__FILE__) . '/Controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'MyControllerPrefix',
    'xmlRootNode' => 'response',
));

// Prepare the request
$rest->prepare();

// Make sure the user has the proper permissions, send the user a 401 error if not
if (!$rest->checkPermissions()) {
    $rest->sendUnauthorized(true);
}

// Run the request
$rest->process();
