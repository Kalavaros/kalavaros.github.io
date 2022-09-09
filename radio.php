<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
var interval = setInterval(function(){ 
    $.getJSON('audio_stat.php', function(data) {
        if (getCookie('old_modification') != data.filedate) {
            window.location.reload();
        };

        setCookie('old_modification', data.filedate);
    });
}, 100);

function setCookie(name, value) {
    var cookie_string = name + "=" + encodeURI(value);
    document.cookie = cookie_string;
}

function getCookie(cookie_name) {
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
    return results ? unescape(results[2]) : null;
}

if(getCookie('old_modification') === null) {
    setCookie('old_modification', 0);
}
</script>

<?php
$log = fopen("audio_name.txt", "r");
$name = fread($log, filesize("audio_name.txt"));
fclose($log);

$log = fopen("time.txt", "r");
$timestamp = floatval(fread($log, filesize("time.txt")));
fclose($log);
?>



<div id="audio">
<audio controls loop id="playAudio">
    <source src="<?php echo "uploads/".$name; ?>">
</audio>
</div>

<div id="test1"></div>
<div id="test2"></div>
<div id="test3"></div>

<script>
function play(){
    const element = document.getElementById("playAudio");
    element.setAttribute("autoplay", '');
    document.getElementById("test2").innerHTML = "play!";
}

const d1 = new Date();
calc = 10000-d1.getTime()+<?php echo $timestamp; ?>; 
time = calc>0 ? calc : 0;
document.getElementById("test1").innerHTML = time;
const myTimeout = setTimeout(play, time);
</script>



<!---
<audio controls autoplay loop id="playAudio">
   <source src="<?php echo "uploads/".$name; ?>">
</audio>
--->


</html>