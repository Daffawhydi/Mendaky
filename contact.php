<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Set SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Host Gmail
    $mail->SMTPAuth   = true;
    $mail->Username   = 'emailkamu@gmail.com'; // Ganti dengan emailmu
    $mail->Password   = 'aplikasi_password';   // Gunakan App Password, bukan password Gmail langsung
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Set email
    $mail->setFrom('emailkamu@gmail.com', 'Web Ekyjoky');
    $mail->addAddress('emailkamu@gmail.com');  // Tujuan email (bisa sama)

    // Ambil data dari form
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $pesan = $_POST['message'];

    $mail->isHTML(true);
    $mail->Subject = "Pesan dari $nama";
    $mail->Body    = "
        <strong>Nama:</strong> $nama<br>
        <strong>Email:</strong> $email<br>
        <strong>Pesan:</strong><br>$pesan
    ";

    $mail->send();
    echo 'Pesan berhasil dikirim!';
} catch (Exception $e) {
    echo "Pesan gagal dikirim. Error: {$mail->ErrorInfo}";
}
