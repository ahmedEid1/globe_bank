 <?php
 ob_start();


 session_start();


 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 define('PRIVATE_PATH', dirname(__FILE__));
 define('PROJECT_PATH', dirname(PRIVATE_PATH));
 define('PUBLIC_PATH', PROJECT_PATH . '/public');
 define('SHARED_PATH', PRIVATE_PATH . '/shared');

//$public_end = strpos($_SERVER["SCRIPT_NAME"], '/public') + 7;
//$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
//define('WWW_ROOT', $doc_root );
$path = '/globe_bank/public/';

  require_once('functions.php');
  require_once('database.php');
  require_once("query_functions.php");
  require_once('validation_functions.php');

  $db = db_connet();
  $errors = [];

  ?>
