<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "alt.d9-2oy6qf10@yopmail.com"; // Replace with the recipient's email address
    $subject = "Test Email"; // Replace with the email subject
    $message = "This is a test email sent using PHP's mail() function."; // Replace with the email message
    $headers = "From: sender@example.com"; // Replace with the sender's email address

    if (mail($to, $subject, $message, $headers)) {
        $status = "success";
        $message = "Email sent successfully.";
    } else {
        $status = "error";
        $message = "Email could not be sent.";
    }

    $response = array(
        "status" => $status,
        "message" => $message
    );

    header("Content-Type: application/json");
    echo json_encode($response);
}
?>