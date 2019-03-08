<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include "dbconfig.php";
session_start();
if(isset($_POST["id"])&&isset($_POST["password"])&&isset($_POST["email"])&&isset($_POST["introduce"]))
{
    //die("Not Opened Yet Sorry!");
    die("<script>alert('".signup($_POST["id"],$_POST["password"],$_POST["introduce"],$_POST["email"])."');history.go(-1);</script>");
}else{
    die("<script>alert('Invailed Parameter');history.go(-1);</script>");
}
?>