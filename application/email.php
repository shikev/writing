<?php

require 'PHPMailerAutoload.php';

//Get the uploaded file information
$errors = "";
$fileName =
    basename($_FILES['uploaded_file']['name']);
 
//get the file extension of the file
$type_of_uploaded_file =
    substr($fileName,
    strrpos($fileName, '.') + 1);
 
$size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/1024;//size in KBs

//Settings
$max_allowed_file_size = 4096; // size in KB
$allowed_extensions = array("pdf", "docx", "rtf");
 
//Validations
if($size_of_uploaded_file > $max_allowed_file_size )
{
  $errors .= "\n File is too large";
}
 
//------ Validate the file extension -----
$allowed_ext = false;
for($i=0; $i<sizeof($allowed_extensions); $i++)
{
  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
  {
    $allowed_ext = true;
  }
}
 
if(!$allowed_ext)
{
  $errors .= "\n The uploaded file is not supported file type.".
  " Only the following file types are supported: ".implode(',',$allowed_extensions);
}

//copy the temp. uploaded file to uploads folder
$upload_folder = "uploads/";
$filePath = $upload_folder . $fileName;
$tmpPath = $_FILES["uploaded_file"]["tmp_name"];
var_dump($tmpPath);
 
if(is_uploaded_file($tmpPath))
{
  if(!copy($tmpPath,$filePath))
  {
    $errors .= '\n Error while copying the uploaded file. You can send the file directly to the following email: ';
  }
}

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bobguy2007@gmail.com';                 // SMTP username
$mail->Password = 'bigaoneunnaren';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress('shikev@umich.edu', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment($filePath);         // Add attachments
$mail->isHTML(true);                                 // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>