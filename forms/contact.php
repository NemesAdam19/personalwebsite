<?php
    header('Content-Type: text/html; charset=utf-8');
    $message = "Küldés";
        $contactName = $_POST['contactName'];
        $contactPhone = $_POST['contactPhone'];
        $contactEmail = $_POST['contactEmail'];
        $contactText = $_POST['contactText'];
    
        if(empty($contactName) || empty($contactPhone) || empty($contactEmail) || empty($contactText)) {
            $message = "Minden mező kitöltése kötelező!";
            exit;
        }
        
    
        $email_from = 'fotisz1211@gmail.com';
        $email_subject = "Új ajánlatkérelem";
        $email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';
        $email_body = base64_encode("Új ajánlatkérés információi: \n".
            "Név: $contactName\n".
            "Telefonszám: $contactPhone\n".
            "E-mail: $contactEmail\n".
            "Ajánlatkérelem: $contactText\n");
    
        $to = "fotisz1211@gmail.com";
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: base64';
        
    
        if (mail($to,$email_subject,$email_body,$headers)) {
            $message = "Köszi! Hamarosan jelentkezünk!";
        } else {
            echo "Sikertelen küldés!";
        }
    
?>
