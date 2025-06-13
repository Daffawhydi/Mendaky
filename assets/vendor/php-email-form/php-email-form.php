<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


class PHP_Email_Form {
  public $to = '';
  public $from_name = '';
  public $from_email = '';
  public $subject = '';
  public $messages = [];

  public function add_message($content, $label = '', $priority = 0) {
    $this->messages[$priority] = ($label ? "$label: " : '').$content;
  }

  public function send() {
    $mail = new PHPMailer(true);
    try {
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';       // atau smtp.mailtrap.io, smtp.yourdomain.com
$mail->SMTPAuth = true;
$mail->Username = 'rezzshop2004@email.com';   // Ganti dengan email pengirim
$mail->Password = 'rezkyaditya2004';     // Ganti dengan password yang benar
$mail->SMTPSecure = 'tls';            // atau 'ssl' tergantung host
$mail->Port = 587;                    // 465 kalau pakai SSL


      $mail->setFrom($this->from_email, $this->from_name);
      $mail->addAddress($this->to);
      $mail->Subject = $this->subject;

      ksort($this->messages);
      $mail->Body = implode("\n", $this->messages);
      $mail->send();

      return '✅ Pesan berhasil dikirim, terima kasih!';
    } catch (Exception $e) {
      return '❌ Gagal mengirim, error: '.$mail->ErrorInfo;
    }
  }
}
?>
