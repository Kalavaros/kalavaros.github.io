<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
console.log("Started script!");
var interval = setInterval(function(){ 
    $.getJSON('audio_stat.php', function(data) {
        console.log("got here!");
        if (getCookie('old_modification') != data.filedate) {
            console.log("How did I get here?!");
            window.location.reload();
        };

        setCookie('old_modification', data.filedate);
    });
}, 1000);

function setCookie(name, value) {
    console.log("setting cookie")
    var cookie_string = name + "=" + encodeURI(value);
    document.cookie = cookie_string;
}

function getCookie(cookie_name) {
    console.log("getting cookie")
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
    return results ? unescape(results[2]) : null;
}

if(getCookie('old_modification') === null) {
    setCookie('old_modification', 0);
}
</script>

<script>
console.log(5 + 6);
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