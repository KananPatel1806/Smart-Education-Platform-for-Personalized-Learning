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
      margin: 10px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  
    
    .navbar {
  overflow: hidden;
  background-color: #333;
  width:1600px;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
  </style>
</head>
<body>
  <?php
  include("connection.php");
  $sql = "SELECT * FROM contact1";
  $result=mysqli_query($conn,$sql);

?>
<div class=" container-fluid" >
  <div class="row">
      <div class="navbar">
        <a href="index.html">Add New Student</a>
        <a href="feesEntry.php">Add Fees</a>
        <a href="con_read.php">Show Student List</a>
        <a href="showFeesDetail.php">Show Fees List</a>
        <a href="date_report.php">Show Date Report</a>
      </div>
    </div> 
</div>

  
  <div class="form-container">
    <h2>Fees Entry Form</h2>
    <form action="insert_fees.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="firstName">Student Name</label>
          <select name="drpContact" id="" class="form-control">

          <?php  while($row = mysqli_fetch_array($result))
                 {
          ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['fname']. '-'.$row['lname'] ; ?></option>
          
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="middleName">Amount</label>
          <input type="text" class="form-control" name="amount" placeholder="Amount" required>
            <div class="invalid-feedback">
                Please enter amount.
            </div>
        </div>
        <div class="form-group col-md-4">
          <label for="lastName">Paid Date</label>
          <input type="date" class="form-control" name="fees_date" required>
            <div class="invalid-feedback">
              Please enter fees date.
            </div>
        </div>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

</body>
</html>
