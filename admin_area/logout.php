<?php
session_start();
session_destroy();
if(isset($_COOKIE['idadmin'])) setcookie('idadmin','',time()-365*24*3600,"/");
header("location:index.php");
?>