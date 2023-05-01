<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the complaint ID and response text
    $complaint_id = $_POST['complaint_id'];
    $response_text = isset($_POST['response']) ? $_POST['response'] : "";
    
    // Get the current date and time
    $response_date = date('Y-m-d H:i:s');
    
    // Connect to the database
    $dsn = 'mysql:host=localhost;dbname=first';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }
    
    // Insert the response into the database
    $stmt = $pdo->prepare('INSERT INTO response (complaint_id, response_text, response_date) 
    VALUES (:complaint_id, :response_text, :response_date)');
    $stmt->execute(array(
        ':complaint_id' => $complaint_id,
        ':response_text' => $response_text,
        ':response_date' => $response_date
    ));
    
    // Redirect back to the view complaints page
    header('Location: view-complaints.php');
    exit();
}
