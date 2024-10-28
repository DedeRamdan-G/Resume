<?php
// Aktifkan error reporting untuk debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Memuat file PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Pengaturan SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ddermdangnwn@gmail.com'; // Ganti dengan email Gmail Anda
        $mail->Password   = 'uszg uuad fhos rqbs'; // Ganti dengan App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Menentukan penerima dan pengirim email
        $mail->setFrom('ddermdangnwn@gmail.com', 'Contact Form'); // Ganti dengan email pengirim Anda
        $mail->addAddress('ddermdangnwn@gmail.com'); // Ganti dengan email tujuan

        // Mengambil subjek dari input form
        $mail->Subject = isset($_POST['subject']) && !empty($_POST['subject']) ? $_POST['subject'] : "No Subject";

        // Pengaturan isi email
        $mail->isHTML(true);
        $mail->Body = 'Name: ' . htmlspecialchars($_POST['name']) . '<br>Email: ' . htmlspecialchars($_POST['email']) . '<br>Message: ' . htmlspecialchars($_POST['message']);

        $mail->send();
        echo 'Your message has been sent. Thank you!';
    } catch (Exception $e) {
        echo "Pesan tidak dapat dikirim. Kesalahan: {$mail->ErrorInfo}";
    }
}
?>
