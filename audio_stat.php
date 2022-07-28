<?php
$filename = "audio_name.txt";

if (file_exists($filename)) {
    echo json_encode(array(
        'filedate' => filemtime($filename)
    )); 
} 
?>