<?php
session_start(); // Start the session
header("Content-Type: application/json");

$response = array(); // Initialize an empty array for the response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION["user"]["id"];
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

    // Select data from the database
    //SELECT * FROM `buget` WHERE 1
    $sql = "SELECT buget FROM buget WHERE userId = '$userId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $bugetResult = $result->fetch_assoc();
        $response["status"] = "success";
        $response["buget"] = $bugetResult["buget"]; 
        //$response["sql"] = $sql;
    } else {
        $response["status"] = "error";
        $response["message"] = "No data found for the user.";
        //$response["sql"] = $sql;
    }

    $conn->close();
    
    // Return the buget data as JSON
    echo json_encode($response);
}
?>