
<?php
    include("connection.php");
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM user where email = '$email' and password = '$password'";
    // die();
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0)
    {   
        session_start();
        $_SESSION["loggedin"]=true;
        $_SESSION["uid"]=$uid;
        $_SESSION["email"]=$email;
        echo "login successfully";
        header("location:dashboard_index.php");
    }
    else{
        echo "error";
    }
?>
