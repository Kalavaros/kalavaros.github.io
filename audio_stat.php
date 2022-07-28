<?php

echo json_encode(array(
    'filedate' => filemtime("audio_name.txt")
)); 
?>