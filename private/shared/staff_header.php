<?php
  if(!isset($page_title)){
    $page_title ='Staff Area';
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" media="all" href="<?php echo '/globe_bank/public/stylesheets/staff.css' ?>" />
    <meta charset="utf-8">
    <title>GBI - <?php echo h($page_title); ?></title>
  </head>
  <body>
    <header>
      <h1>GBI staff Area</h1>
    </header>
    <nav>
      <ul>
        <li><a href="<?php echo '/globe_bank/public/staff/index.php'; ?>">Menu</a></li>
      </ul>
    </nav>
