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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
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
            font-size:18px;
            text-align: center;
           
        }
        .add{
            color: blue;
            font-size: 22px;
            text-decoration: none;
            border-radius: 2px;  
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
        $s = @$_POST['query'];
        $sql = "SELECT f.*,c.fname,c.lname FROM fees1 f 
        inner join contact1 c on c.id = f.c_id" ;
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

<table class="table mt-4">
            <tr class="space">
                
                <th>Contact Id</th>
                <th>Firstname</th>
                <th>Amount</th>
                <th>Paid Date</th>
            </tr>
            <?php   
                 while($row = mysqli_fetch_array($result))
                 {
            ?>
            <tr>
                <td><?php echo $row["c_id"];?></td>
                <td><?php echo $row["fname"] . '-' .$row['lname'];?></td>
                <td><?php echo $row["amount"];?></td>
                <td><?php echo $row["paid_date"];?></td>
                        
            </tr>
            <?php
                 }
            ?>
        </table>
    </div>

</body>
 </html>

