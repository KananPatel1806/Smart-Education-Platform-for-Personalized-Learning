<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin" !== true])
    {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
    

<?php
        include("connection.php");
        
        if(@$_POST['id']!='')
        {
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname =  $_POST["lname"];
            $dob   =  $_POST["dob"];
            $totalfees   =  $_POST["totalfees"];
            $course   =  $_POST["course"];
            $email =  $_POST["email"];
            $phone =  $_POST["phone"];
           
            if(!empty($_FILES['filephoto']['name'])){
                $file_name = $_FILES['filephoto']['name'];
                $file_size =$_FILES['filephoto']['size'];
                $file_tmp =$_FILES['filephoto']['tmp_name'];
                $file_type=$_FILES['filephoto']['type'];
                move_uploaded_file($file_tmp,"images/".$file_name);

                $subQry .= ",photo='$file_name' ";
            }
            
           
            $sql = "update contact1  set photo = '$file_name', fname = '$fname', mname = '$mname', lname = '$lname', dob = '$dob' , totalfees = '$totalfees',  course = '$course' , email = '$email' ,phone = '$phone'  where id = $id ";
            $result=mysqli_query($conn,$sql);
            if ($result == TRUE) {
                echo "record has been updated successfully";
                header("Location:con_read.php");
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
        else{

            $id = @$_GET["id"];
            $sql = "select * from contact1 where id = $id";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result))
            {
                $fname = $row["fname"];
                $mname = $row["mname"];
                $lname=$row["lname"];
                $dob=$row["dob"];
                $totalfees=$row["totalfees"];
                $course = $row["course"];
                $email=$row["email"];
                $phone=$row["phone"];
            
            }
        }
        
    ?>
    
<div class="container">
  <div class="form-container">
    <h2>Contact Form</h2>
    <form method="post" action="con_edit.php" enctype="multipart/form-data">
      <div class="form-row">
      <div>
            <input class="mt-2" style="margin-left:220px;" type="file" id="file-multiple-input" name="filephoto" multiple="" class="form-control-file" value="<?php echo $photo ?>" >
        </div>
        <div class="form-group col-md-4">
          <label for="firstName">First Name</label>
          <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $fname ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="middleName">Middle Name</label>
          <input type="text" class="form-control" name="mname" placeholder="Middle Name" value="<?php echo $mname ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="lastName">Last Name</label>
          <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $lname ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="dob">Date of Birth</label>
          <input type="date" class="form-control" name="dob" value="<?php echo $dob ?>">
        </div>
        <div class="form-group col-md-4">
          
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="course">Course</label>
          <select class="form-select form-control" name= "course" aria-label="Default select example">
                <option selected>Course</option>

                <option value="C/C++" <?php if($course == "C/C++") echo "selected"; ?>>C/C++</option>
                <option value="Python" <?php if($course == "Python") echo "selected"; ?>>Python</option>

                <option value="HTML/BOOSTRAP"<?php if($course == "HTML/BOOSTRAP") echo "selected"; ?>>HTML/BOOSTRAP</option>
                <option value="Coding Jr."<?php if($course == "Coding Jr.") echo "selected"; ?>>Coding Jr.</option>
                <option value="CCC"<?php if($course == "CCC") echo "selected"; ?>>CCC</option>
                <option value="Tally"<?php if($course == "Tally") echo "selected"; ?>>Tally</option>
                <option value="PHP"<?php if($course == "PHP") echo "selected"; ?>>PHP</option>
              </select required>
          
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="mobile">Contact Number</label>
          <input type="tel" class="form-control" name="phone" placeholder="Contact Number" value="<?php echo $phone ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="totalfees">Total Fees</label>
          <input type="text" class="form-control" name="totalfees" placeholder="Total Fees" value="<?php echo $totalfees ?>">
        </div>
      </div>
      
      <div><input type="hidden" name="id" value="<?php echo $id ?>"></div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

</body>
</html>