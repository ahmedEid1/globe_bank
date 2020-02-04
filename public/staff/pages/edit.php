<?php

require_once('../../../private/initialize.php');


if(!isset($_GET['id'])){
  redirect_to($path."staff/pages/index.php");
}
$id = $_GET['id'];


if(is_post_request()){
  $page = [];
  $page['subject_id'] = $_POST['subject_id'] ?? '';
  $page['menu_name'] = $_POST['menu_name'] ?? '';
  $page['position'] = $_POST['position'] ?? '';
  $page['visible'] = $_POST['visible'] ?? '';
  $page['content'] = $_POST['content'] ?? '';
  $page['id'] = $id;
  $result = update_page($page);
  if($result===true){
  redirect_to($path."staff/pages/show.php?id=".$id);
}else{
  $errors= $result;
}

}else {
  $page = find_page_by_id($id);
}
  $page_set = find_all_pages();
  $page_count = mysqli_num_rows($page_set);
  mysqli_free_result($page_set);




 ?>

 <?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH."/staff_header.php"); ?>


<div id = "contant";>
  <a class="back-link" href="<?php echo $path."staff/pages/index.php"; ?>"
    >&laquo; Back to list</a>

  <div class="page new">
    <h1>Edit Page</h1>
<?php echo display_errors($errors); ?>
    <form  action="<?php echo $path."staff/pages/edit.php?id=".
    h($id); ?>"
       method="post">
       <dl>
         <dt>Subject</dt>
         <dd>
           <select  name="subject_id">

           <?php
              $subject_set = find_all_subjects();
              while($subject = mysqli_fetch_assoc($subject_set)){
                echo "<option value=\"".h($subject['id'])."\"";
                if($page['subject_id'] == $subject["id"]){
                  echo " selected";
                }
                echo ">".h($subject['menu_name'])."</option>";
              }
              mysqli_free_result($subject_set);
            ?>
           </select>

         </dd>
       </dl>
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name='menu_name' value="<?php echo h($page['menu_name']); ?>"</dd>

      </dl>
      <dt>Position</dt>
      <dd>
        <select name="position">
          <?php
              for($i=1;$i<=$page_count;$i++){
                echo "<option value\"{$i}\"";
                if ($page['position']==$i) {
                  echo " selected";
                }
                echo ">{$id}</option>";
              }

           ?>
          </select>
      </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1" <?php if($page['visible']=="1"){echo "checked";} ?>>
      </dd>
    </dl>
    <dl>
      <dt>content</dt>
      <dd><textarea></textarea></dd>
    </dl>
    <div id="operations">
        <input type="submit" value="Edit page">
    </div>
    </form>

  </div>


</div>
<?php include(SHARED_PATH."/staff_footer.php"); ?>
