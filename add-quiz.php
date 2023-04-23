<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fts";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Initialize quiz variables
$quiz_id = 1; // Change this to match the desired quiz ID

// Create an array of 10 MCQs
$quiz_questions = array(
  "What is the capital of France?",
  "What is the highest mountain in the world?",
  "What is the largest mammal on Earth?",
  "What is the smallest country in the world?",
  "What is the largest country in the world by area?",
  "What is the name of the first man to walk on the moon?",
  "What is the currency of Japan?",
  "What is the largest ocean on Earth?",
  "What is the chemical symbol for gold?",
  "What is the main ingredient in chocolate?"
);

// Create an array of the correct answers to the MCQs
$quiz_answers = array(
  "Paris",
  "Mount Everest",
  "Blue Whale",
  "Vatican City",
  "Russia",
  "Neil Armstrong",
  "Yen",
  "Pacific Ocean",
  "Au",
  "Cocoa"
);

// Insert the MCQs into the database
for ($i = 0; $i < 10; $i++) {
  $quiz_question = $quiz_questions[$i];
  $quiz_answer = $quiz_answers[$i];

  $sql = "INSERT INTO quiz (quiz_id, quiz_question, quiz_answer)
  VALUES ('$quiz_id', '$quiz_question', '$quiz_answer')";

  if (mysqli_query($conn, $sql)) {
    echo "MCQ created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close connection
mysqli_close($conn);

?>
