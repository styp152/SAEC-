<?php session_start();
    if($_SESSION["log"]!=1){
        header("location:index.php");
    }
?>