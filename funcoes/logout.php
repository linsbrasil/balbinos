<?php
    include_once '../inc/inc.php';
    session_start();
    session_destroy();
    header("location:".SITE_URL);
?>

