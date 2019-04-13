<?php
require 'header.php';

if(isset($_GET['id'])) {
    $id = sanitizeString($_GET['id']);
}

if(isset($_POST['q']) && $_GET['id']) {
    $score = 0;
    $result = $_POST['q'];
    
    foreach($result as $res) {
        if($res == "1") {
            $score++;
        }
    }
    
    $fh = fopen("../data/$id.txt", 'w') or die("Failed to create file");
    fwrite($fh, $score) or die("Could not write to file");
    fclose($fh);
    header("location: page2.php?id=$id");
}

echo <<<_END

<html>
    <head>
            <title>Examination</title>
            <link href="../css/page1.css" type="text/css" rel="stylesheet">
            <meta charset="utf-8">
    </head>
        
    <body>
        <div id="headerx" >
            <div class=left><img id="logo" src="../img/uniben-logo.png" class="small" alt="logo"></div>
            <div class=right><span id="page">1/2</span></div>
        </div>
        
        <div id='container'>
            <form id="question-paper" action="../php/page1.php?id=$id" method="post">
                <p>1. Who invented the telephone?<br />
                    <input type="radio" name="q[1]"
                    value="0" /> John Snow
                    <input type="radio" name="q[1]" value="1" /> Alexander Graham Bell
                    <input type="radio" name="q[1]" value="0" /> My Dick
                </p><br>
                <p>2. What is the name of Google's parent company?<br />
                    <input type="radio" name="q[2]"
                    value="0" /> Apple
                    <input type="radio" name="q[2]" value="0" /> Cisco
                    <input type="radio" name="q[2]" value="1" /> Alphabet
                </p><br>
                <p>3. Which private space company made the Falcon Heavy rocket?<br />
                    <input type="radio" name="q[3]"
                    value="1" /> SpaceX
                    <input type="radio" name="q[3]" value="0" /> Deep Horizon
                    <input type="radio" name="q[3]" value="0" /> NASA
                </p><br>
                <input class="form-button" type="submit" value="Next">
            </form>
        </div>
    </body>
</html>

        
_END;

