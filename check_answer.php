<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "fts");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get submitted answer and correct answer from database
$submitted_answer = $_POST["answer"];
$correct_answer = $_POST["correct_answer"];

// Check if answer is correct or not
if ($submitted_answer == $correct_answer) {
    echo "Congratulations! Your answer is correct.";
} else {
    echo "Sorry, your answer is incorrect. The correct answer is: " . $correct_answer;
}

mysqli_close($conn);
?>
