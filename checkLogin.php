<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
   
    <style>
    body{
  
    background-image:url(images/background.jpg);
    background-repeat: no-repeat;
    background-size: cover;   
}
.card {
    border-radius: 10px;
}

.card-header { 
    text-align: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.card-body {
    padding: 2rem;
}
.head1{
    text-align: center;
    color:white;
    font-size:27px;
    font-family: fantasy;
}

    </style>
</head>
<body>
    <div class="box"></div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class=" col-md-6">
                <h3 class="head1">Welcome, to Student Registration Application</h3>
                <div class="card">
                    <div class="card-header">
                        <h3>Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="check_insert.php">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" >
                            </div>
                            <center><button type="submit" class="btn btn-primary">Register</button> </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
