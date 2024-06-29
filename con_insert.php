<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin" !== true])
    {
        header("location:login.php");
    }
?>
<?php
    include("connection.php");

  
    

    $fname=$_POST["fname"];
    $mname=$_POST["mname"];
    $lname=$_POST["lname"];
    $dob=$_POST["dob"];
    $totalfees = $_POST["totalfees"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $course=$_POST["course"];

    if(!empty($_FILES['filephoto']['name'])){
        $file_name = $_FILES['filephoto']['name'];
        $file_size =$_FILES['filephoto']['size'];
        $file_tmp =$_FILES['filephoto']['tmp_name'];
        $file_type=$_FILES['filephoto']['type'];
        move_uploaded_file($file_tmp,"images/".$file_name);
    }

    echo $sql = "INSERT INTO contact1(photo,fname,mname,lname,dob,totalfees,email,phone,course)
        VALUES('$file_name','$fname','$mname','$lname','$dob','$totalfees','$email','$phone','$course')";
   
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "insert record successfully";
        header("location:con_read.php");
        
    }
    else{
        echo "error";
    }
    
?>