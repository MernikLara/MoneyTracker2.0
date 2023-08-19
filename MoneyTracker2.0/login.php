<?php

session_start(); // Start the session
header("Content-Type: application/json");
$response = array(); // Initialize an empty array for the response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['email'];
    $pass = $_POST["geslo"];

    // Database connection setup
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moneytracker";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $checkQuery = "SELECT * FROM registered WHERE email='$user'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['pass'])) {
            
            $response["status"] = "success";
            $response["message"] = "Login successful!";

/*            // Fetch user data
            $getUserQuery = "SELECT * FROM registered WHERE email='$user'";
            $userResult = $conn->query($getUserQuery);
            $userRow = $userResult->fetch_assoc();
            
            // Store user data in the response
            $response["user"] = $userRow;*/
            
            // Fetch user data
            $getUserQuery = "SELECT * FROM registered WHERE email='$user'";
            $userResult = $conn->query($getUserQuery);
            $userRow = $userResult->fetch_assoc();
            
            // Store user data in the session
            $_SESSION["user"] = $userRow;

        } else {
            $response["status"] = "error";
            $response["message"] = "Incorrect password.";
        }
    } else {
        $response["status"] = "error";
        $response["message"] = "User not found.";
    }

    $conn->close();
    
    // Return the response as JSON
    echo json_encode($response);
}
?>