<?php 
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$reset_token)
{   
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                                 //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                      //Enable SMTP authentication
        $mail->Username   = 'gshare0303@gmail.com';                   //SMTP username
        $mail->Password   = 'jrautwmlacekupxb';                      //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('gshare0303@gmail.com', 'G SHARE');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);  //Set email format to HTML
        $mail->Subject = 'Your Reset password link from G SHARE';
        $mail->Body    = "Your email forgot password reset link 
        <a href='http://localhost/g-share/landingpage/updatepass.php?email=$email&reset_token=$reset_token'>Reset</a>";
      
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if(isset($_POST['reset']))
{
    $query=" SELECT * FROM `userinfo` WHERE `email` ='$_POST[email]'";

    $result = mysqli_query($conn,$query);
    if($result)
    {
      if(mysqli_num_rows($result)==1)
      {
            $reset_token =bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Dhaka');
            $date=date("Y-m-d");
            $updateQ = "UPDATE `userinfo` SET `reset_token`='$reset_token',`token_expired`= '$date' WHERE `email`= '$_POST[email]'";
            if(mysqli_query($conn,$updateQ)&& sendMail($_POST['email'],$reset_token))
            {
                echo "<script>alert('Password reset link send to your mail');
                window.location.href='forgetpass.php';</script>";
               
            }
            else
            {
                echo "<script>alert('Error');
                window.location.href='forgetpass.php';</script>";
            }
        }
      else{
        echo "<script>alert('Email not found');
        window.location.href='forgetpass.php';</script>";
      }
    }
    else{
        echo "<script>alert('Some error occur,please try again');
        window.location.href='landingpage.html';</script>";
    }
}

?>