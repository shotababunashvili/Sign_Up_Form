<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/Exception.php";
require "../PHPMailer/SMTP.php";

function getRowCountByEmail($mailAddr, $hnd)
{
    //echo "mailAddr = ".$mailAddr."\n";
    $statement = $hnd->prepare("SELECT count(*) FROM info where Email = ?");
    //$statement->bindColumn(1, $mailAddr, PDO::PARAM_STR,30);
    $statement->bindParam(1, $mailAddr);
    $statement->execute();
    $count = $statement->fetchColumn();

    return $count;
}




function sendMail($email,$subject,$body)
{



    $name = 'New User';




    $mail = new PHPMailer();
    try {

        //email settings
        $mail->isSMTP();
        $mail->Host =  "smtp.gmail.com";
        //$mail->Host = "ssl://smtp.gmail.com";

        $mail->SMTPAuth = true;
        $mail->Username = "shotikomailreciver@gmail.com";
        $mail->Password = "shotagio15";
        $mail->Port = 465;
        //$mail->Port = 587;
        $mail->SMTPSecure = "ssl";
        //$mail->SMTPSecure = "tls";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //smtp settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        //echo "inside mail setFrom \n";
        //echo "email= ".$email."\n";
        //echo "name= ".$name."\n";
        $mail->addAddress($email);


        $mail->Subject = $subject;
        $mail->Body = $body;


        if($mail->send()){
            $status = "success";
            $response = "Email has been sent successfully";
        }
        else{
            $status = "failed";
            $response = "Something is wrong: ".$mail->ErrorInfo;
        }
        //echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
    }
    catch (Exception $e) {
        $status = "failed";
        $response = "Something is wrong: ".$mail->ErrorInfo."  e: ".$e;
    }
    return json_encode(array("status" => $status, "response" => $response));
    //exit(json_encode(array("status" => $status, "response" => $response)));
    //echo json_encode(array("status" => $status, "response" => $response));
}
