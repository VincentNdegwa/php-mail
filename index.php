<?php
include "DB.php";
require "phpmailer/vendor/autoload.php";

function encryptData($data, $key, $iv)
{
    $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($encryptedData);
}


$obj = (object)$_POST;
// $obj = new stdClass();
$userid = $obj->userid = 1;
$useremail = $obj->email = "ndegwavincent7@gmail.com";
$status = 0;
$createdon = date("Y-m-d H:i:s", time());
$createdby = $userid;
$lastedited = date("Y-m-d H:i:s", time());
$lasteditedBy = $userid;
$ipaddress = $_SERVER["REMOTE_ADDR"];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


$insertQuery = "INSERT INTO auth_reset (userid, email, status, createdon, createdby, lastedited, lasteditby, ipaddress) VALUES ('$userid', '$useremail', '$status', '$createdon', '$createdby', '$lastedited', '$lasteditedBy', '$ipaddress')";

$result = mysqli_query($con, $insertQuery);
if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    echo "Data inserted successfully";
    $insertId = mysqli_insert_id($con);

    $updateQuery = "UPDATE auth_reset SET link = MD5($insertId) WHERE id = $insertId";
    $updateResult = mysqli_query($con, $updateQuery);
    if (!$updateResult) {
        echo "Error updating link: " . mysqli_error($con);
    }

    $resetlink = "http://localhost/forgot-password/decrypt.php?link=" . md5($insertId);
    echo $resetlink;

    try {
        $mail->SMTPDebug = 1;                                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mailer.wisedigits.co.ke';             //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hrm@wisedigits.co.ke';              //SMTP username
        $mail->Password   = 'RcKsmMD&H4OU@wise';                           //SMTP password
        $mail->SMTPSecure = "tls";                                  //Enable implicit TLS encryption
        $mail->Port       = 587;

        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('hrm@wisedigits.co.ke', 'Vincent Ndegwa');
        $mail->addAddress($useremail);

        // Email subject and body
        $mail->Subject = 'Password Reset';
        $mail->Body    = "Please click the following link to reset your password: {$resetlink}";

        // Send the email
        $mail->send();
        echo 'Email has been sent successfully!';
    } catch (\Throwable $th) {
        echo "failed to send the email";
    }
}
