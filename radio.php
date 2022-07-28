<!DOCTYPE html>
<html>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js">
var interval = setInterval(function(){ 
    $.getJSON('audio_stat.php', function(data) {
        if (getCookie('old_modification') != data.filedate) {
            window.location.reload();
        };

        setCookie('old_modification', data.filedate);
    });
}, 1000);

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
?>


<audio controls autoplay id="playAudio">
   <source src="<?php echo "uploads/".$name; ?>">
</audio>


</html>