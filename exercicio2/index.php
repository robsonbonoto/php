<?php
function redirecionar()
{
    header("Location: http://www.google.com");
    exit();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    redirecionar();
} elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
    redirecionar();
}
?>