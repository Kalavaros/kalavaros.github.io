
<?php
if(isset($_FILES['fileToUpload'])){
  $file_name = $_FILES['fileToUpload']['name'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  move_uploaded_file($file_name, "uploads/".$file_name);
  $GLOBALS['audio'] = $file_name;
}
?>
