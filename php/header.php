<?php
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
