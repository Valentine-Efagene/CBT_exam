<?php // cbt_index.php

require 'login.php';

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
        $_SESSION['id'] = $id;
        $_SESSION['password'] = $password;
        die("You are now logged in. Please <a data-transition='slide'
        href='page1.php?id=$id'>click here</a> to start the exam.</div>
        </body></html>");
        $result->close();
        $conn->close();
    }
}

function queryMysql($conn, $query)
{
    $result = $conn->query($query);

    if (!$result) {
        die("Fatal Error");
    }
    
    return $result;
}

function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
}

function sanitizeString($var)
{
    if (get_magic_quotes_gpc()) {
        $var = stripslashes($var);
    }

    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}

function sanitizeMySQL($connection, $var)
{
    $var = $connection->real_escape_string($var);
    $var = sanitizeString($var);
    return $var;
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