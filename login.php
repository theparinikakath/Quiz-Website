<!DOCTYPE html>
<html>
<head>
    <title>LOGIN PAGE</title>
    <h1>WELCOME TO QUIZ!</h1>
    <!--<link rel="stylesheet" type="text/css" href="bootstrap.css">-->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

            <h2 class="text-center card-header">Login Form</h2>
            <form action="validation.php" method="post">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" name="user" class="form-control">
                </div>
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" name="password" class="form-control">
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                    
                </div>
            </form>
            <form action="logout.php" method="post">
</div>
        </div>
        <div class="col-lg-6">
            <div class="card">
            <h2 class="text-center card-header"> Sign In Form</h2>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" name="user" class="form-control">
                </div>
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" name="password" class="form-control">
                    <button type="submit" class="btn btn-primary">SIGN IN</button>
                </div>
            </form>
                </div>
        </div>
    </div>
</div>
</body>
</html>

