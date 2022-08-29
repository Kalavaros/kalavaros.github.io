<!DOCTYPE html>
<html>

<?php include 't2s.php';?>

<?php
if(isset($_FILES['fileToUpload'])){
  $file_name = $_FILES['fileToUpload']['name'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  move_uploaded_file($file_tmp, "uploads/".basename($file_name));
  $log = fopen("audio_name.txt", "w+");
  fwrite($log, $file_name);
  fclose($log);
}
?>

<?php
if(isset($_FILES['textToUpload'])){
  $file_name = $_FILES['textToUpload']['name'];
  $file_tmp = $_FILES['textToUpload']['tmp_name'];
  if(move_uploaded_file($file_tmp, "uploads/".basename($file_name))){
  $audio = saveSound(file_get_contents('uploads/'.basename($file_name)));
  $log = fopen("audio_name.txt", "w+");
  fwrite($log, "t2s.mp3");
  fclose($log);
}
}
?>

  <audio controls id="playAudio">
    <source src="<?php echo "uploads/".$file_name; ?>">
  </audio>


  <form action="index.php" method="post" enctype="multipart/form-data">
   Select music to upload:
   <input type="file" name="fileToUpload" id="fileToUpload">
   <input type="submit" value="Upload Music" name="submit">
  </form>

  <form action="index.php" method="post" enctype="multipart/form-data">
    Select text to read:
    <input type="file" name="textToUpload" id="textToUpload">
    <input type="submit" value="Upload Text" name="submit">
  </form>

</html>