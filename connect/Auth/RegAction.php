<?php
include '../config/config.php'; 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$Cpassword = $_POST['Cpassword'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function sendMail($email,$verify_code){
    require ("../PHPMailer/PHPMailer.php");
    require ("../PHPMailer/SMTP.php");
    require ("../PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try { 

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'gshare0303@gmail.com';                     //SMTP username
        $mail->Password   = 'jrautwmlacekupxb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('gshare0303@gmail.com', 'G SHARE');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);   //Set email format to HTML
        $mail->Subject = 'Email Verification from G SHARE';
        $mail->Body    = "
        <h2>Hello!</h2>
        <p>Thank you for registering with G SHARE. Please click the button below to verify your email address:</p>
        
        <a href='http://localhost/commerce-and-connect/connect/Auth/verify_mail.php?email=$email&v_code=$verify_code' style='display: inline-block; background-color: #4CAF50; color: white; padding: 10px 15px; text-align: center; text-decoration: none; border-radius: 4px; font-weight: bold;'>Verify Email</a>
        
        <p>Thank you,</p>
        <p>G SHARE Team</p>";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }


}


$name_pattern = "/[a-zA-Z\s]/";
$email_pattern = "/(cse|eee|law)_\d{10}@lus\.ac\.bd/";
$phone_pattern = "/(\+88)?-?01[3-9]\d{8}/";
$password_pattern = "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";

$duplicate_name = mysqli_query($conn, "SELECT * FROM `userinfo` WHERE username='$name'");

if (mysqli_num_rows($duplicate_name) > 0) {
    echo "<script>alert('Username has already been taken')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
}

$duplicate_email = mysqli_query($conn, "SELECT * FROM `userinfo` WHERE email='$email'");
if (mysqli_num_rows($duplicate_email) > 0) {
    echo "<script>alert('Email already exists')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
}

if (!preg_match($name_pattern, $name)) {
    echo "<script>alert('Invalid username!')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
} elseif (!preg_match($email_pattern, $email)) {
    echo "<script>alert('Invalid email!')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
} elseif (!preg_match($phone_pattern, $phone)) {
    echo "<script>alert('Invalid phone!')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
} elseif (!preg_match($password_pattern, $password)) {
    echo "<script>alert('Invalid password!')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
} elseif ($password != $Cpassword) {
    echo "<script>alert('Passwords do not match!')</script>";
    echo "<script>location.href='registrationPage.html'</script>";
    exit;
} else {
    $verify_code = bin2hex(random_bytes(16));

    $insert_query = "INSERT INTO `userinfo`(`username`, `email`, `mobile`, `pass`,`verify_code`,`is_verified`) VALUES ('$name','$email','$phone','$password','$verify_code','0')";

    if (mysqli_query($conn, $insert_query)&& sendMail($_POST['email'],$verify_code)) {
        echo "<script>alert('Registration Sucessfull, A verification mail send to your mail')</script>";
        echo "<script>location.href='../Home/LandingPage.html'</script>";
        exit;
    } else {
        die("Not inserted");
    }
}
?>