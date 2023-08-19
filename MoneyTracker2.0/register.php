<?php
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['ime'];
    $email = $_POST['email'];
	$pass = $_POST["geslo"];
    $gender = $_POST["spol"];
    $dateofbirth = $_POST["rojstvo"];

    // You can perform validation on the input fields here

	//Argon2 
	$options = [
		'memory_cost' => 1024, // Memory cost in KB
		'time_cost'   => 2,    // Number of iterations
		'threads'     => 2,    // Number of threads
	];

	$hashedPassword = password_hash($pass, PASSWORD_ARGON2I, $options);
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

	$checkQuery = "SELECT * FROM registered WHERE email='$email'";
	$result = $conn->query($checkQuery);
	if ($result->num_rows > 0) {
        $response["status"] = "error";
        $response["message"] = "User already exists.";
    }
	else{
		// Insert data into the database
		$sql = "INSERT INTO registered (email, pass, bday, gender, name) VALUES ('$email', '$hashedPassword', '$dateofbirth', '$gender', '$name')";

		if ($conn->query($sql) === TRUE) {
            $response["status"] = "success";
            $response["message"] = "Registration successful!";
		} else {
			$response["status"] = "error";
            $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
       
		}
	}
    $conn->close();	
    echo json_encode($response);
}
?>