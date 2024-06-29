<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin" !== true])
    {
        header("location:login.php");
    }
?>
<?php

    include("connection.php");
    $cid =$_POST["drpContact"];
    $amount=$_POST["amount"];
    $fees_date=$_POST["fees_date"];

    $sql = "INSERT INTO fees1(c_id,amount,paid_date)
        VALUES('$cid','$amount','$fees_date')";

    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "insert record successfully";
        header("location:showFeesDetail.php");
        
    }
    else{
        echo "error";
    }
    
?>