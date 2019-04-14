<?php
require 'header.php';

if(isset($_GET['id'])) {
    $id = sanitizeString($_GET['id']);
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
            <div class=right><span id="page">2/2</span></div>
        </div>
        
        <div id='container'>
            <form id="question-paper" action="result.php?id=$id" method="post">
                <p>4. Who was America's first black president?<br />
                    <input type="radio" name="q[4]"
                    value="1" /> Barrack Obama<br />
                    <input type="radio" name="q[4]" value="0" /> George Washington<br />
                    <input type="radio" name="q[4]" value="0" /> Elvis Presley<br />
                </p><br>
                <p>5. Who is the king of pop?<br />
                    <input type="radio" name="q[5]"
                    value="0" /> Michael Jackson<br />
                    <input type="radio" name="q[5]" value="0" /> Cisco<br />
                    <input type="radio" name="q[5]" value="1" /> Alphabet<br />
                </p><br>
                <p>6. Who was the author of the Harry Potter series?<br />
                    <input type="radio" name="q[6]"
                    value="1" /> J. K. Rowling<br />
                    <input type="radio" name="q[6]" value="0" /> George Orwell<br />
                    <input type="radio" name="q[6]" value="0" /> Maya Angelou<br />
                </p><br>
                <input class="form-button" type="submit" value="Next">
            </form>
        </div>
    </body>
</html>

        
_END;

