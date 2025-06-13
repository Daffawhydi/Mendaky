<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'rezzshop2004@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = [
  'host' => 'example.com',
  'username' => 'example',
  'password' => 'pass',
  'port' => '587'
];

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  if(isset($_POST['phone'])) {
    $contact->add_message( $_POST['phone'], 'Phone');
  }
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>


<?php
require '../assets/vendor/php-email-form/php-email-form.php';

$f = new PHP_Email_Form;
$f->to         = 'rezzshop2004@gmail.com';
$f->from_name  = $_POST['name'];
$f->from_email = $_POST['email'];
$f->subject    = 'Form Konsultasi dari '.$f->from_name;

$f->add_message($_POST['name'], 'Nama');
$f->add_message($_POST['email'], 'Email');
$f->add_message($_POST['message'], 'Pesan');

echo $f->send();
?>
