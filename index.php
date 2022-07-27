<!DOCTYPE html>
<html>
  Hello world

  <?php
if(isset($_FILES['fileToUpload'])){
  $file_name = $_FILES['fileToUpload']['name'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  move_uploaded_file($file_tmp, "uploads/".basename($_FILES["fileToUpload"]["name"]));
  global $_AUDIO;
  $_AUDIO = $file_name;
}
?>

  <audio controls autoplay id="playAudio">
    <source src="<?php echo "uploads/".$_AUDIO; ?>">
  </audio>


  <form action="index.php" method="post" enctype="multipart/form-data">
   Select music to upload:
   <input type="file" name="fileToUpload" id="fileToUpload">
   <input type="submit" value="Upload Music" name="submit">
  </form>

</html>