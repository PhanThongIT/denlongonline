<?php
// Gửi mail theo PHP thuần

function sendMail($nameReciper,$subject,$content){
    require_once "src/PHPMailer.php";
    $emailReciper =
    $mail = new PHPMailer(true);                              // Cho phép bắt lỗi
    try {
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'phanthongit13@gmail.com';                 // SMTP username
        $mail->Password = 'phanthongit112';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to //ssl: 465
        //        //Recipients
//        $emailReciper ='phanthongit13@gmail.com';
        $mail->setFrom('phanthongit13@gmail.com', $nameReciper);
        $mail->addAddress('phanthongit13@gmail.com');     // Add a recipient
        //$mail->addReplyTo('thanhtungtourist79@gmail.com', $subject);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com'); // 3 người gửi nhưng 2 người thấy

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments //gửi file
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }


}
?>