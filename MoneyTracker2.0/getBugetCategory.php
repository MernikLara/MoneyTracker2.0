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
    $sql = "SELECT `id`, `category`, `max`, `spend`, `averageExpense`, `userId` FROM `bugetcategory` WHERE userId = '$userId'";
    $result = $conn->query($sql);
    
    $dataResult = $conn->query($sql);
    $dataRows = array(); // Initialize an array to hold the data

    if ($result->num_rows > 0) {
        $bugetResult = $result->fetch_assoc();
        $response["status"] = "success";
        while ($row = $dataResult->fetch_assoc()) {
            $dataRows[] = $row; // Add each row to the array
        }
        $response["data"] = $dataRows;
    } else {
        $response["status"] = "error";
        $response["message"] = "No data found for the user.";
    }

    $conn->close();
    
    // Return the buget data as JSON
    echo json_encode($response);
}
?>