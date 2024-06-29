
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
    <title>Report Between Dates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
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
   
</div>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Report Between Dates</h2>
        <form method="POST" action="">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fromDate" class="form-label">From Date</label>
                    <input type="date" class="form-control" id="fromDate" name="fromDate" required>
                </div>
                <div class="col-md-6">
                    <label for="toDate" class="form-label">To Date</label>
                    <input type="date" class="form-control" id="toDate" name="toDate" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php
        include("connection.php");

$fromDate=@$_POST['fromDate'];
$toDate=@$_POST['toDate'];

?>
<h3 style="padding-left: 100px;color:blue">Report from <?php echo $fromDate?> to <?php echo $toDate?></h3>
		<hr >
        <div class="row">
<table class="table table-bordered" width="100%"  border="0" style="padding-left:40px">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Id</th>
                                        <th scope="col">Firstname</th>
                                        <th scope="col">Lastname</th>
                                        <th scope="col">Paid Fees</th>
                                        <th scope="col">Paid Date</th>
                                    </tr>
                                </thead>
                                <?php
                                $qry = "SELECT f.*,c.fname,c.lname FROM fees1 f 
                                inner join contact1 c on c.id = f.c_id  where paid_date between '$fromDate' and '$toDate' ORDER BY paid_date ";
                            
$ret=mysqli_query($conn,$qry);
$num=mysqli_num_rows($ret);
if($num>0){
    $total = 0;
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    $total = $total + $row['amount'];
?>

<tbody>
<tr data-expanded="true">
            <td><?php echo $cnt;?></td>
                 
                  <td><?php  echo $row['fname'];?></td>
                  <td><?php  echo $row['lname'];?></td>
                  <td><?php  echo $row['amount'];?></td>
                  <td> <?php  echo $row['paid_date'];?></td>
                  
                </tr>
                 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this dates</td>
 
  </tr>
<?php } ?> 
<tr>
    <td colspan="3" >
</td>
<td>    
    <?php echo $total;?></td> 
    <td></td>            
                                </tbody>
                            </table>
                        </div>
      </div>
    </div>  
  </div><!--/center-->
  <hr>
</div>

    </div>
</body>
</html>
