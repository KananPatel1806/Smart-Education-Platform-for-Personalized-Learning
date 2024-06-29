<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin" !== true])
    {
        header("location:login.php");
    }
?><?php
include("connection.php");
$id = $_GET["id"];
$sql="delete from contact1 where id = $id";
$result=mysqli_query($conn,$sql);
header("Location: con_read.php");
?>  