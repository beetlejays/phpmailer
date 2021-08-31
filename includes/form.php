<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$firstname = "";
$email = "";
$sent = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // variables
      $firstname = $_POST["firstname"];
      $email     = $_POST["email"];

      // Error Messages Array
      $errors = [];

      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
      {
            $errors[] = "Please enter a valid Email address";
      }
      if ($firstname == "") 
      {
            $errors[] = "Please enter a firstname";
      }
      if (empty($errors))
      {
            //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.ionos.de';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Email address here';                     //SMTP username
    $mail->Password   = 'Password here';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('Address from where it was sent', 'Mailer');
    $mail->addAddress('Recipient Adress', 'Joe User');     //Add a recipient
    $mail->addReplyTo($email);
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nachricht vom Kontaktformular';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    $sent = true;

 
} catch (Exception $e) {
    $errors[] = $mail->ErrorInfo;
}
      }
}


?>