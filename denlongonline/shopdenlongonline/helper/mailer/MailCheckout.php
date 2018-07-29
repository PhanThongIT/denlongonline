<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 4:23 AM
 */
// Xử lý mailer để gửi token cho khách hàng


function sendMail($emailRecipient, $nameRecipient, $subject, $content)
{
    require_once 'src/PHPMailer.php';

    $mail = new PHPMailer(true);
    try
    {
        //Server settings
        $mail->CharSet   = "UTF-8";
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'phanthong1396@gmail.com';
        $mail->Password   = 'phanthongit112';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;   //ssl: 465

        //Recipients
        $mail->setFrom('phanthong1396@gmail.com', 'Phan Văn Thông');

        $mail->addAddress($emailRecipient, $nameRecipient);
        $mail->addReplyTo('phanthong1396@gmail.com', $subject);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $content;
        //$mail->AltBody = 'Chào bạn......';

        $mail->send();
        return true;

    }
    catch (Exception $e)
    {
        return false;
    }
}

?>