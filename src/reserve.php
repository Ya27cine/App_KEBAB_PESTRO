<?php 

    if( $_SERVER["REQUEST_METHOD"] == "POST"){

        $data['name'] = trim( $_POST['nom'] );
        $data['email'] = trim( $_POST['email'] );
        $data['phone'] = trim( $_POST['phone'] );
        $data['message'] = trim( $_POST['message'] );
        $data['datepicker'] = trim( $_POST['datepicker'] ); 
          
        try {
            include('sendMail.php');

            //Content

            $mail->Subject = "Reservation Table";

            $msg = '<a href="mailto:'.$data['email'].'?subject=Kebab-Pestro (resarvation table)&body=Ecrivez ici si vous avez des questions" title="" >Click ici pour repondre </a>';
            $mail->Body    = $data['message'].', Date : '.$data['datepicker'].' ,Mobile : '.$data['phone'].' <br /> '.$msg;

            $mail->send();
            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

?>