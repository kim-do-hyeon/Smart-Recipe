<?php
    session_start();
    if (isset($_SESSION['id']))
    {
    	$login_chk = 1;
    }
    else
    {
    	$login_chk = 0;
    }
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $host = '';
    $user = '';
    $pw = '';
    $dbName = '';
    $mysqli = new mysqli($host, $user, $pw, $dbName);

    extract($_POST);
    $id = $_SESSION["id"];
    $q = "INSERT INTO User (id, title, telephone, category, address, roadAddress ) VALUES ('$id', '$title', '$telephone', '$category', '$address', '$roadAddress' )";
    $mysqli->query( $q);
    
    $mysqli->close();
    echo ("<script>alert('Successful Your Process');location.href='/upload.php';</script>")
?>
