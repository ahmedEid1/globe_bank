<?php

require_once('../../../private/initialize.php');


if(is_post_request()){
  $page = [];
  $page['subject_id'] = $_POST['subject_id'] ?? '';
  $page['menu_name'] = $_POST['menu_name'] ?? '';
  $page['position'] = $_POST['position'] ?? '';
  $page['visible'] = $_POST['visible'] ?? '';
  $page['content'] = $_POST['content'] ?? '';

$result = insert_page($page);
if($result === true){
  $_SESSION['message'] = "this subject was created sucessfullly";

  $new_id = mysqli_insert_id($db);
  redirect_to($path."staff/pages/show.php?id='".$new_id."'");

}
else{
  $errors = $result;
}

}else {
  $page = [];
  $page['subject_id'] = '';
  $page['menu_name'] = '';
  $page['position'] = '';
  $page['visible'] =  '';
  $page['content'] = '';
}
  $page_set = find_all_pages();
  $page_count = mysqli_num_rows($page_set) +1;
  mysqli_free_result($page_set);




 ?>

 <?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH."/staff_header.php"); ?>


<div id = "contant";>
  <a class="back-link" href="<?php echo $path."staff/pages/index.php"; ?>"
    >&laquo; Back to list</a>

  <div class="page new">
    <h1>Create Page</h1>
    <?php echo display_errors($errors); ?>

    <form  action="<?php echo $path."staff/pages/new.php"; ?>"
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
                  echo ">{$i}</option>";
                }

             ?>
        </select>
      </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1" <?php if($page['visible']=="1"){echo 'checked';} ?>>
      </dd>
    </dl>
    <dl>
      <dt>content</dt>
      <dd><textarea></textarea></dd>
    </dl>
    <div id="operations">
        <input type="submit" value="Create page">
    </div>
    </form>

  </div>


</div>
<?php include(SHARED_PATH."/staff_footer.php"); ?>
