<?php require_once("../../..//private/initialize.php"); ?>


<?php

    $id = $_GET['id']  ?? '1 ';


    $subject = find_subject_by_id($id);
 ?>
<?php $page_title="Show Subject"; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="contant">

  <a class="back-link" href="<?php echo $path.'staff/subjects/index.php'; ?>">&laquo; Back to list</a>

  <div class="subject show">
    <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>

    <div class="attributes">
      <dl>
          <dt>Menu Name</dt>
          <dd><?php echo h($subject['menu_name']); ?></dd>
      </dl>
      <dl>
          <dt>Position</dt>
          <dd><?php echo h($subject['position']); ?></dd>
      </dl>
      <dl>
          <dt>Visible</dt>
          <dd><?php echo $subject['menu_name']=='1' ? 'true' : 'false'; ?></dd>
      </dl>

    </div>
  </div>

</div>
<?php include(SHARED_PATH."/staff_footer.php"); ?>
