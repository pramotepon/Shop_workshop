<?php
session_start();
session_destroy();
$_SESSION["mem_id"]=="";
header("location:index.php")
?>