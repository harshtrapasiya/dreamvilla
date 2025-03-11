
<?php
use PHPMailer\PHPMailer\PHPMailer;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
require "PHPMailer/Exception.php";

// echo $_REQUEST['FullName'];die;
if (isset($_POST['FullName']) && isset($_POST['Email'])) {
 
    $Fullname = $_POST['FullName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $file_tmp  = $_FILES['doc']['tmp_name'];
    $file_name = $_FILES['doc']['name'];
    // //...
    // $mail->addAttachment($file_tmp, $file_name);
    // $attachment = $_FILES["doc"]["tmp_name"]; 
    // $content = file_get_contents($attachment); 
    // $content = chunk_split(base64_encode($content));

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "ynhc.com.au";
    $mail->SMTPAuth = False;
    $mail->Username = "admin@ynhc.com.au"; //enter you email address
    $mail->Password = 'Admin$ynhc2021'; //enter you email password
    $mail->Port = 25;
    $mail->SMTPSecure = "None";
    $mail->SMTPDebug = 2;

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($Email, $Fullname);
    $mail->addAddress("admin@ynhc.com.au"); //enter you email address
    $mail->Subject = ("inquiry");
    $mail->addAttachment($file_tmp, $file_name);


    $emailmessage = "<p style='font-size: 18px; color: #000000; font-weight: 600; padding-left: 20px;'>You have received Inquiry email</p>
    <div style='background:#f5f5f5; border: 1px solid #0000002f; border-radius: 10px; max-width: 600px;'>
	<div style=' display: grid; grid-template-columns: 80px 10px auto; grid-gap:50px ; border-bottom: 1px solid #0000002f;padding:15px 20px;  '><p style='margin: 0; font-weight:500; color: #000000;'> Name </p><span style='font-weight: 500;'>:</span><p style='color:#000000;font-size: 16px;  margin: 0; font-weight: 600; '> $Fullname </p></div>
    <div style=' display: grid; grid-template-columns: 80px 10px auto; grid-gap:50px ; padding: 15px 20px;  border-bottom: 1px solid #0000002f'><p style='margin: 0; font-weight:500; color: #000000;'> Email </p><span style='font-weight: 500;'>:</span><p style='color:#000000;font-size: 16px;  margin: 0; font-weight: 600;'> $Email </p></div>
    <div style=' display: grid; grid-template-columns: 80px 10px auto; grid-gap:50px ; padding: 15px 20px; '><p style='margin: 0; font-weight:500; color: #000000;'> Mobile</p><span style='font-weight: 500;'>:</span><p style='color:#000000;font-size: 16px;  margin: 0; font-weight: 600;'> $Phone </p></div>";
    $mail->Body = $emailmessage;


    $mail->Body = $emailmessage;

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));


}