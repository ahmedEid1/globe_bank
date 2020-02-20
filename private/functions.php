
<?php

function u($value="")
{
  return urlencode($value);
}

function raw_u($value="")
{
  return rawurlencode($value);
}

function h($value='')
{
  return htmlspecialchars($value);
}

function error_404(){
  header($_SERVER["SERVER_PROTOCOL"].
  " 404 Not Found");
  exit();
}

function error_500(){
  header($_SERVER["SERVER_PROTOCOL"].
  " 500 Internal Server Error");
  exit();
}

function redirect_to($loc){
  header("Location: ".$loc);
  exit();
}
function is_post_request(){
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array()){
  $output = '';
  if(!empty($errors)){
    $output .= "<div class=\"error\">";
    $output .= "Please fix the following errors";
    $output .= "<ul>";
    foreach ($errors as $error) {
      $output .= "<li>".h($error)."</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function get_and_clear_session_message(){
  if(isset($_SESSION['message']) && $_SESSION['message'] != ''){
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}


function display_session_message(){
  $msg = get_and_clear_session_message();
  if(!is_blank($msg)){
    return '<div id="message">'.h($msg)."</div>";
  }
}










 ?>
