<?php
session_start();
$token = md5(session_id());
if(isset($GET['token']) && $GET['token'] === $token){
    session_destroy();
    header("location: /visivel/login.php");
    exit();
} else{
    echo '<a href="doLogout.php?token=".$token>Confirmar logout</a>';
}
?>