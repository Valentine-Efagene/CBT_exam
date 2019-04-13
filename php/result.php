<?php
require 'header.php';

if(isset($_POST['q']) && isset($_GET['id'])) {
    $id = sanitizeString($_GET['id']);
    $fh = fopen("../data/$id.txt", 'r') or
    die("File does not exist or you lack permission to open it");
    $score = fgets($fh);
    fclose($fh);
    
    $result = $_POST['q'];
    
    foreach($result as $res) {
        if($res == "1") {
            $score++;
        }
    }
    
    if (!unlink("../data/$id.txt")) {
        echo "Could not delete file";
    }

    echo "You scored: $score/6<br>";
}