<?php
require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to($path."staff/pages/index.php");
}

$id= $_GET['id'];

if(is_post_request()){

  $result = delete_page($id);
  $_SESSION['message'] = "this subject was created sucessfullly";

  redirect_to($path.'staff/pages/index.php');
}else{
  $page = find_page_by_id($id);
}


 ?>


 <?php $page_title = 'Delete page'; ?>
<?php include(SHARED_PATH."/staff_header.php"); ?>

<div id="contant">

  <a class="back-link" href="<?php echo $path.
  'staff/pages/index.php'; ?>">&laquo; Back to list</a>
  <div class="page delete">
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete this page?</p>
    <p class="item"><?php echo h($page['position']); ?></p>

    <form  action="<?php echo $path.'staff/pages/delete.php?id='
    .h(u($page['id'])); ?>" method="post">
      <div id="operation">
        <input type="submit" name="commit" value="Delete Page">

      </div>

    </form>

  </div>
</div>
<?php include(SHARED_PATH."/staff_footer.php"); ?>
