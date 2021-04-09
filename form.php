<?php
// error_reporting(0); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'assets/phpmailer/Exception.php';
require 'assets/phpmailer/PHPMailer.php';
require 'assets/phpmailer/SMTP.php';

if (isset($_POST['submit'])) {
   $name = strip_tags($_POST['fullname']);
   $email = strip_tags($_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];
   $location = strip_tags($_POST['location']);
   $destination = strip_tags($_POST['destination']);      
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = "smtp.gmail.com";                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "oladayoahmod112@gmail.com";                     // SMTP username
    $mail->Password   = 'rojeqrlsgragxipe';                             // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email,'client');
    $mail->addAddress('oladayoahmod112@gmail.com', 'ASAC Multiventure company');     // Add a recipient
               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');//

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Tansportation Booking';
    $mail->Body =
    '<html>
<head>
</head>
<body>
     <div style="width: 94%;background-color: #f3f4f6;border-style:red; margin-left: 3%;margin-right: 3%; padding-top: 20px;padding-bottom: 20px; font-size: 14px;">
        <div style="background-color: white; border-radius: 10px;padding-left: 15px;padding-right: 15px;margin: 0 auto; width:90%;">
    <h2 style="text-align: center; padding-top:20px;"><span style="color: red;">ASAC </span><span style="color: dodgerblue;">multiventure</span></h2>
    <h3 style="text-align: center; color:grey;">Message received from client about transport booking, kindly get back to them sooner.</h3><br>
    <h3>Below are booking details submitted :</h3>'.
    '<p> Client Name : ' .$name. '</p>'.
    '<p> Client Number : ' .$number. '</p>'.
    '<p> Client Destination : ' .$destination. '</p>'.
    '<p> Booked Date : ' .$date. '</p>'.
    '<p> Client Location : ' .$location. '</p> <br>'.
'</div><br>'.
 '<div style="height: 30px; width: 92%; background-color:#f8f8f8; text-align: center; color: grey;border-radius: 15px;margin: 0 3% 0 4%;">
            <p style="font-style: italic; position: relative;top: 5px;">Thanks for contacting us. We are glad to work with you!</p>

                    </div><br>
    <footer style="margin: 0 3% 0 4%; width: 90%;height: 50px;border-radius:15px;box-shadow: -20px -20px 20px rgba(255,255,255,0.5),
                20px 20px 20px rgba(0,0,0,0.05);background-color:white;padding: 10px;">
                <p style="text-align: center;font-size: 14px;">Copyright &copy; 2020 <span style="text-decoration-color:salmon;color: red;">SAC multiventure</span>All rights reserved</p>
    </footer>
</div> 
</body>
</html>'; 
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    #echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location:index.html");
}
// if this doesn't work after connecting it to the internet , i am gonna check the credenecials firstly then i am gonna check the send function limiting it to just one to avoid a fatal error being thrown at me by php mailer #noted: scroll spy in jquery// SEO/DIGITAL MARKWTING CONTENT
if ($mail->send()) {
    $autorespond = new PHPMailer();
    $autorespond->isSMTP();
    $autorespond->CharSet = 'UTF-8';
    $autorespond->SMTPDebug = 0;
    $autorespond->SMTPSecure = 'ssl';
    $autorespond->Port = 465;
    $autorespond->SMTPAuth   = true;
    $autorespond->Username = 'oladayoahmod112@gmail.com';
    $autorespond->Password = 'rojeqrlsgragxipe';
    $autorespond->Host = 'smtp.gmail.com';
    $autorespond->setFrom('oladayoahmod112@gmail.com','ASAC Multiventure Company');
    $autorespond->addAddress($email);
    $autorespond->isHTML(true);
    $autorespond->Subject = 'Dear ' .$name.'! : Thanks for messaging us!';
    $autorespond->Body = 
    '<html>
<head>
</head>
<body>
     <div style="width: 94%;background-color: #f3f4f6;border-style:red; margin-left: 3%;margin-right: 3%; padding-top: 20px;padding-bottom: 20px; font-size: 14px;">
        <div style="background-color: white; border-radius: 10px;padding-left: 15px;padding-right: 15px;margin: 0 auto; width:90%;">
    <h2 style="text-align: center; padding-top:20px;"><span style="color: red;">ASAC </span><span style="color: dodgerblue;">multiventure</span></h2>
    <h3 style="text-align: center; color:grey;">We have received your message about your booking, we shall get back to you sooner.</h3><br>
    <h3>Below are your project details submitted to us :</h3>'.
    '<p> Your Name : ' .$name. '</p>'.
    '<p> Your Number : ' .$number. '</p>'.
    '<p> Your Chosen Destination : ' .$destination. '</p>'.
    '<p> Booked Date : ' .$date. '</p>'.
    '<p> Your Current Location : ' .$location. '</p> <br>'.
'</div><br>
 <div style="height: 30px; width: 92%; background-color:#f8f8f8; text-align: center; color: grey;border-radius: 15px;margin: 0 3% 0 4%;">
            <p style="font-style: italic; position: relative;top: 5px;">Thanks for contacting us. We are glad to work with you!</p>

                    </div><br>
    <footer style="margin: 0 3% 0 4%; width: 90%;height: 50px;border-radius:15px;box-shadow: -20px -20px 20px rgba(255,255,255,0.5),
                20px 20px 20px rgba(0,0,0,0.05);background-color:white;padding: 10px;">
                <p style="text-align: center;font-size: 14px;">Copyright &copy; 2020 <span style="text-decoration-color:salmon;color: red;">Asac Multiventure</span>All rights reserved</p>
    </footer>
</div> 
</body>
</html>';
    $autorespond->send();
    header("location:index.html");
}
