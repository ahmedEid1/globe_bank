<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Globe Bank <?php if(isset($page_title)){
      echo "-".h($page_title);
    } ?></title>
    <?php if(isset($preview) && $preview){echo "[ PREVIEW ]";} ?>

    <link rel="stylesheet" href="<?php echo $path."stylesheets/public.css"; ?>">
  </head>
  <body>
      <header>
        <h1>
          <a href="<?php echo $path."index.php"; ?>">
          <img src="<?php echo $path."images\gbi_loge.png" ?>"
          width="298" height="71"alt="">
          </a>
        </h1>
      </header>
