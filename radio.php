<!DOCTYPE html>
<html>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js">



function checkEverySecond() {
    setInterval(function() {
        check();
    }, 1000);
}
function check() {
    $.getJson('audio_stat').done(function(json) {
        if (didChange(json)) {// use _.isEqual to write your didChange
            takeAction();
        }
    });
}

</script>


<?php
$log = fopen("audio_name.txt", "r");
$name = fread($log, filesize("audio_name.txt"));
fclose($log);
?>


<audio controls autoplay id="playAudio">
   <source src="<?php echo "uploads/".$name; ?>">
</audio>


</html>