<?php
require ("../Controller/database.php");
require ("../Models/sign_up.php");
require ("../Controller/UTILS.php");


$OBJ = new sign_up(null, $_POST['F_Name'], $_POST['L_Name'], $_POST['Email']);
$emailCount = getRowCountByEmail($OBJ->Email,$handler);
$status = '';
$response = '';
if (!$emailCount) {
    $statement = $handler->prepare("INSERT INTO `info` (`F_Name`, `L_Name`, `Email`) 
                                                        VALUES(:F_Name, :L_Name, :Email)");

    $statement->bindParam(':F_Name', $OBJ->F_Name);
    $statement->bindParam(':L_Name', $OBJ->L_Name);
    $statement->bindParam(':Email', $OBJ->Email);

    $statement->execute();

    $helper = '';
    $helper.= '<h1>'.$OBJ->F_Name. '</h1>';
    $helper.= '<h1>'.$OBJ->L_Name. '</h1>';
    $helper.= '<h1>'.$OBJ->Email. '</h1>';
    $mailInfo =  sendMail('test@developers-alliance.com','Registration Alert',$helper);
    //echo $mailInfo;
    //echo "Data is Inserted Successfully";
    $status = 'success';
    $response = 'ok!';
}
else{
    // echo 'error: email is more than one .....';
    $status = 'error';
    $response = 'email is more than one emailCount = '.$emailCount;
}


exit(json_encode(array("status" => $status, "response" => $response)));

