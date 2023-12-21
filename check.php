<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

$con = mysqli_connect('localhost:3306', 'root', 'parinika');
mysqli_select_db($con, 'quizdb');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['quizcheck'])) {
        $count = count($_POST['quizcheck']);
        echo "OUT OF 5 YOU HAVE SELECTED " . $count . " options<br>";
        
        $result = 0;
        $selected = $_POST['quizcheck'];
        $q = "SELECT * FROM questions";
        $query = mysqli_query($con, $q);

        while ($rows = mysqli_fetch_array($query)) {
            $qid = $rows['qid']; // Get the question ID
            if (isset($selected[$qid])) { // Check if an answer is selected for this question
                $checked = $rows['ans_id'] == $selected[$qid]; // Match with the correct answer ID

                if ($checked) 
                {
                    $result++;
                }
            }
        }
        echo "Your total score is = " . $result . "<br>";
        
        $name = $_SESSION['username'];
        
        // Check if the user already exists in the 'user' table
        $checkQuery = "SELECT COUNT(*) FROM user WHERE username = '$name'";
        $checkResult = mysqli_query($con, $checkQuery);
        $countUser = mysqli_fetch_row($checkResult)[0];

        if ($countUser > 0) {
            // User already exists, update their record
            $updateQuery = "UPDATE user SET totalques = 5, answerscorrect = $result WHERE username = '$name'";
            $updateResult = mysqli_query($con, $updateQuery);

            if ($updateResult) {
                echo "Results have been updated successfully.<br>";
            } else {
                echo "Error updating results: " . mysqli_error($con);
            }
        } else {
            // User doesn't exist, insert a new record
            $insertQuery = "INSERT INTO user (username, totalques, answerscorrect) VALUES ('$name', 5, $result)";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                echo "Results have been recorded successfully.<br>";
            } else {
                echo "Error recording results: " . mysqli_error($con);
            }
        }
    } 
    else 
    {
        echo "Your quizcheck is empty. Please select at least one option.";
    }
} else {
    echo "pari";
}
?>
