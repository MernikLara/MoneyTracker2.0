<?php
session_start(); // Start the session
header("Content-Type: application/json");
$data = array();  // Initialize an empty array to store data
$skipFirst = true;

$keys = array_keys($data);
$counter = 0;
$sqlInserString = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION["user"]["id"];
    $buget;
    foreach ($_POST as $key => $value) {
        // $key will contain the name of the input field, and $value will contain its value
        if ($key === 'buget') {
            $buget = $_POST["buget"];
            continue; // Skip the 'buget' field
        }
        if($counter == 0){
            $sqlInserString .= "('$value', ";
            $counter++;
        }
        else if($counter == 1){
            $sqlInserString .= "$value, 0, ";
            $counter++;
        }
        else if($counter == 2){
            $sqlInserString .= "$value, $userId),";
            $counter = 0;
        }
    }

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
    echo json_encode($response);
}
?>