
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


 ?>
