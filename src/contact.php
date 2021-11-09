<?php 

    if( $_SERVER["REQUEST_METHOD"] == "POST"){

        $data['name'] = trim( $_POST['name'] );
        $data['email'] = trim( $_POST['email'] );
        $data['subject'] = trim( $_POST['subject'] );
        $data['message'] = trim( $_POST['message'] );
        
        try {
            include('sendMail.php');

            //Content

            $mail->Subject = $data['subject'];

            $msg = '<a href="mailto:'.$data['email'].'?subject=Kebab-Pestro reponds('.$data['subject'].')&body=Ecrivez ici la reponse" title="" >Click ici pour repondre </a>';
            $mail->Body    = $data['message'].' <br /> '.$msg;

            $mail->send();
            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

?>