<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include("connection.php");

$sql = "SELECT id, fname, lname, dob FROM contact1 ORDER BY MONTH(dob), DAY(dob)";
$result = mysqli_query($conn, $sql);

$birthdays = [];
while ($row = mysqli_fetch_assoc($result)) {
    $birthdays[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Birthdays</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .table-container {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h2>Upcoming Birthdays</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Contact Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Date Of Birth</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($birthdays as $birthday): ?>
                    <tr>
                        <td><?php echo $birthday["id"]; ?></td>
                        <td><?php echo $birthday["fname"]; ?></td>
                        <td><?php echo $birthday["lname"]; ?></td>
                        <td><?php echo date("F j", strtotime($birthday["dob"])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
