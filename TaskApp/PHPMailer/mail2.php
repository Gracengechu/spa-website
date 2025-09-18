<?php
require_once __DIR__ . '/list.php'; // Ensure this file sets up $conn properly

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Get data from the form
$name  = $_POST['fullname'] ?? '';
$email = $_POST['email'] ?? '';

if (empty($name) || empty($email)) {
    echo "Name and email are required.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format: $email";
    exit;
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO users (fullname, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);
$stmt->execute();
$stmt->close();

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Change to DEBUG_SERVER for troubleshooting
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = ' gracengechu818@gmail.com';   // Your Gmail
    $mail->Password   = ' sotr sjmj mbeb bsyp';           // App Password (NOT Gmail login)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom(' gracengechu818@gmail.com', 'Spa & Wellness Center');
    $mail->addAddress($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to Spa & Wellness Center';
    $mail->Body    = "
        <h2>Dear {$name},</h2>
        <p>Welcome to <b>Spa & Wellness Center</b>! 🌸</p>
        <p>Thank you for registering with us. You can now book appointments, 
        explore our wellness services, and enjoy a relaxing experience tailored just for you.</p>
        <p><a href='http://localhost/spa/login.php' 
              style='padding:10px 15px;background:#7bc8a4;color:#fff;
                     text-decoration:none;border-radius:8px;'>Login to Your Account</a></p>
        <p>Warm regards,<br>Spa & Wellness Team</p>
    ";
    $mail->AltBody = "Dear {$name}, Welcome to Spa & Wellness Center! Thank you for registering with us.";

    $mail->send();
    echo "Registration successful. A welcome email has been sent to $email.";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
