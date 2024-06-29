<?php
    session_start();
    if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"] === true)
    {
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body{
  background-image:url(images/login.jpg);
  background-repeat: no-repeat;
  background-size: cover;   
}
.btn-group {
            display: flex;
            justify-content: center; /* Center align buttons horizontally */
            margin-bottom: 20px;
             /* Optional: Adjust margin as needed */
        }
        .btn-group .btn {
            margin: 0 5px; /* Optional: Adjust spacing between buttons */
        }
</style>
</head>
<body>
    <div class="container">
       
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="login_insert.php">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-success"><a href="stuinfo.html">Sudent</button>
                                            <button type="button" class="btn btn-outline-success"><a href="dashboard_index.php">Admin</button>
                                            <button type="button" class="btn btn-outline-success"><a href="teacher.html">Teacher</button>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <button type="submit" class="btn btn-outline-primary btn-block "><a href="conread.php">Login</button>
                            <button  type="submit" class="btn btn-outline-primary btn-block mt-2"><a href="checkLogin.php">Register</a></button>
                            
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

