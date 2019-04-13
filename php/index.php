<?php // cbt_index.php

require 'login.php';
require 'header.php';

$id = $password = "";
$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Fatal Error");
}

if (isset($_POST['id']) && isset($_POST['password'])) {
    $id = sanitizeMySQL($conn, $_POST['id']);
    $password = sanitizeMySQL($conn, $_POST['password']);
    
    $result = queryMySql($conn, "SELECT id, password from students WHERE id='$id' AND password='$password'");
    
    if($result -> num_rows == 0) {
        $error = "Invalid login attempt";
    }else {
        session_start();
        die("You are now logged in. Please <a data-transition='slide'
        href='page1.php?id=$id'>click here</a> to start the exam.</div>
        </body></html>");
        $result->close();
        $conn->close();
    }
}

echo <<<_END

<html>
    <head>
            <title>Log in</title>
            <link href="../css/index.css" type="text/css" rel="stylesheet">
            <meta charset="utf-8">    
    </head>
        
    <body style="color: white">
        <div id='container'>
            <div class='left'></div>
            <div class='right'>
                <div id='form-box'>
                    <form title="Login" action="index.php" method="post">
                        <label for="username">UserName</label><br>
                        <input placeholder="Student ID" class="input" name="id" required="" type="text"><br>
                        <label for="id">id</label><br/><br/>
                        <input placeholder="Password" class="input" name="password" required="" type="password"><br>
                        <input type="submit" value="Sign In">
                    </form>
        
                    <span style="color: #FF0000" class='error'>$error</span>
                </div>
            </div>
        </div>
    </body>
</html>

        
_END;
?>