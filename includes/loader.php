<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
session_start();
require_once ("Singleton.php");
require_once("model/Movie.php");
require_once("model/Theater.php");
require_once("model/Seat.php");
require_once("model/Coupon.php");
require_once("model/ModelsDatabase.php");
require_once("model/Movie.php");
require_once("model/News.php");
require_once("model/RegisteredUser.php");
require_once("model/Ticket.php");
require_once("model/User.php");
require_once("controller/AuthenticationController.php");
require_once("controller/Controller.php");
require_once("controller/NewsController.php");
require_once("controller/DashboardController.php");
require_once("controller/MovieSearchController.php");
require_once("controller/PurchaseController.php");
require_once("controller/TicketCancellingController.php");
require_once("database/Database.php");
require_once("database/db_object.php");


function redirect($location, $get = "")
{
    header("Location: {$location}" . $get);
}


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'apikey';                     //SMTP username
    $mail->Password = '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';                                  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('myhomeqrc@gmail.com', 'sina');
    $mail->addAddress('sina.pordanesh@yahoo.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test email';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
//    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
