
<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

table {
        border-collapse: collapse;
        width: 100%;
        }
        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        }
        .space{
           font-weight:300;
            font-size:14px;
            text-align: center;
           
        }

.navbar {
  overflow: hidden;
  background-color: #333;
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
<body style="background-color:white;">

<?php
        include("connection.php");
        // $sql = "SELECT * FROM contact1";
        // $result=mysqli_query($conn,$sql);
        $s = @$_POST['query'];
        $sql = "SELECT c.*,(select sum(amount) from fees1 f where f.c_id = c.id)as paidAmt,totalfees - (select sum(amount) from fees1 f where f.c_id = c.id) as remain,dob FROM contact1 c  WHERE fname LIKE '%$s%' ";
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



<button style="margin-left:1300px;font-size:18px;text-decoration: none;" type="button" class="btn btn-outline-success"><a href=logout.php>Log Out</a></button>

<table class="table mt-4">
            <tr class="space">
                
                <th>Contact Id</th>
                <th>Photo</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Date Of Birth</th>
                <th>Total Fees</th>
                <th>Paid Fees</th>
                <th>Remianing Fees</th>
                <th>Course</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th> 
            </tr>
            <?php   
            
                 while($row = mysqli_fetch_array($result))
                 {
            ?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><img src="images/<?php echo $row["photo"];?>" width="50" height="50" alt=""></td>
                <td><?php echo $row["fname"];?></td>
                <td><?php echo $row["mname"];?></td>
                <td><?php echo $row["lname"];?></td>
                <td><?php echo $row["dob"];?></td>
                <td><?php echo $row["totalfees"];?></td>
                <td><?php echo $row["paidAmt"];?></td>
                <td><?php echo $row["remain"];?></td>
                <td><?php echo $row["course"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["phone"];?></td>
                <td><button type="button" class="btn btn-outline-info"><?php echo "<a href=con_view.php?id=$row[id] style=text-decoration:none>View</a>"?></button></td>
                <td><button type="button" class="btn btn-outline-success"><?php echo "<a href=con_edit.php?id=$row[id] style=text-decoration:none>Edit</a>"?></button></td>
                <td><button type="button" class="btn btn-outline-danger"><?php echo "<a href=con_delete.php?id=$row[id] style=text-decoration:none>Delete</a>"?></button></td>            
            </tr>
            <?php
                 }
            ?>
        </table>
        
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
                  