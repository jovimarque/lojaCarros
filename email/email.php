<?php
require("../helpers/connection.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['enviar']) && isset($_POST['valorProposta']) && isset($_POST['emailProposta']) && isset($_POST['car_id'])){
    try {
        $emailProposta = $_POST['emailProposta'];    
        $valorProposta = $_POST['valorProposta'];
        $stmt = $conexao->prepare("SELECT * FROM carros WHERE id = :id");
        $stmt->bindValue(":id", $_POST['car_id']);
        $stmt->execute();
        $value = $stmt->fetch();

        //Server settings
     	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Email smtp';                     //SMTP username
        $mail->Password   = 'smtp password';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('email','Modelos');
        $mail->addAddress($_POST['emailProposta'], ' User');     //Add a recipient
        //$mail->addAddress('1joao1marques@gmail.com');               //Name is optional
        //$mail->addReplyTo('1joao1marques@gmail.com', 'Information');
        $mail->addCC($_POST['emailProposta']);
        $mail->addBCC($_POST['emailProposta']);
        /*
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        */
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'PROPOSTA';
        $mail->Body   = " Modelo: $value[modelo] <br> Preço:  $value[preco] <br> Ano: $value[ano] <br> Proposta: $_POST[valorProposta]";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        header("location: ../especifico.php");
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
