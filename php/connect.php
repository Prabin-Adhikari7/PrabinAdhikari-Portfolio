<?php
if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['ph_no']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost', 'root', '', 'Portfolio');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO webmessage (fullname, email, ph_no, subject, message) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("ssiss", $fullname, $email, $ph_no, $subject, $message);

    if($stmt->execute()) {
        echo "message sent successfully.";
    } else {
        echo "Error: Failed to send message.";
    }

    $stmt->close();
    $conn->close();
} else {
    // do nothing if form fields are missing
}
?>