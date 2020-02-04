<?php require_once('../../private/initialize.php'); ?>


  <?php $page_title = 'StaffMenu'; ?>
  <?php include(SHARED_PATH.'/staff_header.php'); ?>
     <div id="contant">
       <div id="main_menu">
          <h2>Main Menu</h2>
          <ul>
            <li><a href="/globe_bank/public/staff/subjects/index.php">Subjects</a></li>
            <li><a href="<?php echo $path."staff/pages/index.php"; ?>">Pages</a></li>
          </ul>
       </div>
     </div>
     <?php include(SHARED_PATH.'/staff_footer.php'); ?>
