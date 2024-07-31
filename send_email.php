<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'mail.masabsk.com'; // Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->Username   = 'support@masabsk.com'; // SMTP username
    $mail->Password   = 'Oz2N_NO8c;Qo'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('support@masabsk.com'); // Add a recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body    = 'Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Phone: ' . $_POST['phone'] . '<br>Message: ' . nl2br($_POST['message']);
    $mail->AltBody = 'Name: ' . $_POST['name'] . "\nEmail: " . $_POST['email'] . "\nPhone: " . $_POST['phone'] . "\nMessage: " . $_POST['message'];

    $mail->send();
    echo 'success';
} catch (Exception $e) {
    echo 'error';
}
