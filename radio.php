<!DOCTYPE html>
<html>

<?php
echo $_AUDIO;
?>

<audio controls autoplay id="playAudio">
   <source src="<?php echo "uploads/".$_AUDIO; ?>">
</audio>

</html>