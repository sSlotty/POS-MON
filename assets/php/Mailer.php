<?php 
    require_once('../../connect.php');
    // header("Content-type: application/json; charset=utf-8"); 
    require ('../../vendor/autoload.php');

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    function Mailer($mail,$name,$subject,$text){
            
        $devopermentMode = true;
        $mailer = new PHPMailer($devopermentMode);


        try{
            $mailer->SMTPDebug = 2;
            $mailer->isSMTP();

            if($devopermentMode){
                $mailer->SMTPOptions = [
                    'ssl'=>[
                        'verify_peer' => false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>true
                    ]
                ];
            }

            $mailer->Host = 'mail.oatwant.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'admin@oatwant.com';
            $mailer->Password = '0ZHxcGjt';
            $mailer->SMTPSecure = 'tls';
            $mailer->Port = 587;

            $mailer->setFrom('pos@oatwant.com','Admin POS Point of seal');
            $mailer->addAddress($mail,$name);

            $mailer->isHTML(true);
            $mailer->Subject = $subject;
            $mailer->Body = $text;

            $mailer->send();
            $mailer->clearAllRecipients();

            echo 'Success';

        } catch (Exception $e){
            // echo "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";

        }

   }

?>