<?php

session_start(); // Start the session
header("Content-Type: application/json");
$dataSetJSON = $_POST['dataSet'];
$dataSet = json_decode($dataSetJSON, true); // Decode JSON data

$data = array();  // Initialize an empty array to store data

$keys = array_keys($data);
$counter = 0;
$sqlInserString = "";
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
    foreach ($dataSet as $category) {
        $id = $category['id'];
        $categoryName = $category['category'];
        $max = $category['max'];
        $spend = $category['spend'];
        // ... process and update your database or perform other actions
        
    // update data into the database
    //    UPDATE bugetcategory SET `spend` = 300 WHERE userId = 2 AND category = 'Zenska'
    $sql = "UPDATE bugetcategory SET `spend` = $spend WHERE userId = $userId AND category = '$categoryName'";
    $conn->query($sql);
    }
    $response["status"] = "success";
    $response["message"] = "Bugetcategory Updated!";
/*
    //( Hisa, 2000, 20)
    $sqlInserString = substr($sqlInserString, 0, -1);
    $sqlInserString .=";";
    //echo "String: $sqlInserString";

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

    // Insert data into the database
    $sql = "INSERT INTO bugetcategory (`category`, `max`, `spend`, `averageExpense`, `userId`) VALUES $sqlInserString";

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Bugetcategory Updated!";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql2 = "INSERT INTO `buget`(`userId`, `buget`) VALUES ('$userId','$buget')";
    if ($conn->query($sql2) === TRUE) {
        //$response["status"] = "success";
        $response["message2"] = "buget Updated!";
    } else {
        //$response["status"] = "error";
        $response["message2"] = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();	
    echo json_encode($response);*/
$conn->close();	
}
?>