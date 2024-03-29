<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('info@fls.guru', "Work");
    $mail->addAddress('uva.snegovikk@gmail.com');
    $mail->Subject = 'Work';

    $body = 'Work';

    if(trim(!empty($_POST['name']))){
        $body.='<p>Name: '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p>E-mail: '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['message']))){
        $body.='<p>Message: '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    if (!$mail->send()){
        $message = 'Error';
    } else {
        $message = 'Good';
    }

    $response = ['message' => $message];
    header('Content-type: application.json');
    echo json_encode($response);
?>