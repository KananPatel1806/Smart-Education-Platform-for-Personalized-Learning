<?php
    include("connection.php");
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass= $_POST["password"];
    // $sql = "INSERT INTO user(fname,lname,email,pass,cpassword)
    // VALUES('$fname','$lname','$email','$password','$cpassword')";
     $sql="INSERT INTO user(fname,lname,email,password) 
    VALUES('$fname','$lname','$email','$pass')";

    
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "Insert record successfully";
        header("location:login.php");
    }
    else{
        echo "error";
    }

?> 


