<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: registration.php');
}
$con = mysqli_connect('localhost:3306', 'root', 'parinika');
mysqli_select_db($con, 'quizdb');
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="text-center text-success">WELCOME <?php echo $_SESSION['username']; ?> </h2>
    <h1 class="text-center text-primary">PARINIKA'S QUIZ WORLD</h1>
    <div class="col-lg-8 m-auto d-block">
        <div class="card">
            <h3 class="text-center card-header"> WELCOME <?php echo $_SESSION['username']; ?> ! You have to select only 1 out of 4 options for each question. BEST OF LUCK! </h3>
        </div>
        <br>
        <br>
        <form action="check.php" method="post">
    <?php
    for ($i = 1; $i < 6; $i++) {
        $q = "SELECT * FROM questions WHERE qid=$i";
        $query = mysqli_query($con, $q);

        while ($rows = mysqli_fetch_array($query)) {
            echo '<div class="card">';
            echo '<h4 class="card-header">' . $rows['question'] . '</h4>';
            echo '</div>';

            $q = "SELECT * FROM answers WHERE ans_id=$i";
            $query = mysqli_query($con, $q);

            while ($rows = mysqli_fetch_array($query)) {
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<input type="radio" name="quizcheck[' . $i . ']" value="' . $rows['aid'] . '">';
                echo $rows['answer'];
                echo '</div>';
                echo '</div>';
            }
        }
    }
    ?>
    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-success m-auto d-block">submit</button>
        
    </div>
    
</form>


    </div>
</div>
<br>
<br>
<br>
<br>

<div class="text-center">
    <div>
        <a href="logout.php" class="btn btn-primary">LOGOUT</a>
    </div>
    <br><br>
    <div>
        <h5 class="text-center text-primary">© PARINIKA KATH </h5>
    </div>
    <br>
    <br>
</div>
</body>
</html>
