<?php

class Order extends CI_Controller {

	public function index()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			require(APPPATH . 'libraries/stripe-php/init.php');
			require(APPPATH . 'libraries/PHPMailerAutoload.php');

			$this->load->helper('url');

			$sendEmail = true; //if card declines, don't do the file processing

			\Stripe\Stripe::setApiKey("sk_test_qqAzc9UD2FmtKykhWRRyjeBQ");

			// Get the credit card details submitted by the form
			$token = $this->input->post('stripeToken');
			//var_dump($_POST);
			$price = $this->input->post('order-price');
			//var_dump($price);
			$intprice = intval($price);
			$data['transactionSuccessful'] = false;

			$data['file_errors'] = "";
				$fileName =
				    basename($_FILES['uploaded_file']['name']);
				 
				//get the file extension of the file
				$type_of_uploaded_file =
				    substr($fileName,
				    strrpos($fileName, '.') + 1);
				 
				$size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/2048;//size in KBs

				//Settings
				$max_allowed_file_size = 4096; // size in KB
				$allowed_extensions = array("pdf", "docx", "rtf", "txt", "doc", "wpd", "wps");
				 
				//Validations
				if($size_of_uploaded_file > $max_allowed_file_size )
				{
				  $data['file_errors'] .= "\n File is too large";
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
				  $data['file_errors'] .= "\n The uploaded file is not supported file type.".
				  " Only the following file types are supported: ".implode(',',$allowed_extensions);
				}
			//var_dump($intprice);
			// Create the charge on Stripe's servers - this will charge the user's card
			if($data['file_errors'] == ""){
				try {
					$if(isValidPrice($intprice)){
						$charge = \Stripe\Charge::create(array(
				    "amount" => $price, // amount in cents, again
				    "currency" => "usd",
				    "source" => $token,
				    "description" => "Example charge"
				    ));
					$data['transactionSuccessful'] = true;
				    $data['charge_message'] = "Transaction completed successfully. Your essay will be sent to an editor and you will receive feedback within 24 hours. The editor will contact you shortly.";
					}
					else{
						$data['charge_message'] = "Prices have been tampered with! Your card has not been charged.";
					}
				} catch(\Stripe\Error\Card $e) {
				  // The card has been declined
					$data['charge_message'] = "Card has been declined";
					$sendEmail = false;
				}
			}
			else{
				$sendEmail = false;
				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'scw.noreply@gmail.com';                 // SMTP username
				$mail->Password = 'p@8fh*fn..!';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom('scw.noreply@gmail.com', 'SCW Router');
				$mail->addAddress('shikev@umich.edu', 'Kevin Shi');     // Add a recipient

				$mail->isHTML(true);                                 // Set email format to HTML

				$mail->Subject = 'Essay Order From ' . $this->input->post('order-name');
				$mail->Body    = 'The client\'s email is ' . $this->input->post('order-email') . ". The client was charged" . $price . "for this transaction";
				$mail->Body .= "\nThe client had some file errors, so please get in contact with them.\n";
				$mail->Body .= "ERRORS: " . $data['file_errors'];

				if(!$mail->send()) {
					$data['file_errors'] .= '\n Message could not be sent';
				    // echo 'Message could not be sent.';
				    // echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    //echo 'Message has been sent';
				}
			}
			
			//begin file processing
			if($sendEmail){
				

				//copy the temp. uploaded file to uploads folder
				$upload_folder = $_SERVER['DOCUMENT_ROOT'] . "uploads/"; // CHANGE WHEN DEPLOYING
				$filePath = $upload_folder . $fileName;
				$tmpPath = $_FILES["uploaded_file"]["tmp_name"];
				var_dump($filePath);
				 
				if(is_uploaded_file($tmpPath))
				{
				  if(!copy($tmpPath,$filePath))
				  {
				    $data['file_errors'] .= '\n Error while copying the uploaded file. You can send the file directly to the following email: scwediting@gmail.com';
				  }
				}

				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'scw.noreply@gmail.com';                 // SMTP username
				$mail->Password = 'p@8fh*fn..!';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom('scw.noreply@gmail.com', 'SCW Router');
				$mail->addAddress('shikev@umich.edu', 'Kevin Shi');     // Add a recipient

				$mail->addAttachment($filePath);         // Add attachments
				$mail->isHTML(true);                                 // Set email format to HTML

				$mail->Subject = 'Essay Order From ' . $this->input->post('order-name');
				$mail->Body    = 'The client\'s email is ' . $this->input->post('order-email') . ". The client was charged" . $price . "for this transaction";
				$mail->Body .= "\nERRORS: " . $data['file_errors'];

				if(!$mail->send()) {
					$data['file_errors'] .= '\n Message could not be sent';
				    // echo 'Message could not be sent.';
				    // echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    //echo 'Message has been sent';
				}

				unlink($filePath);
			}
			
			$this->load->view('content/success', $data);
		}
		else{
			$this->load->view('content/home');
		}
		
	}

	public function isValidPrice($inPrice){
		if($inPrice == 1000 || $inPrice == 2500 || $inPrice == 3500 || $inPrice == 4500 || $inPrice == 5500 || $inPrice == 7000 ||){
			return true;
		}
		else{
			return false;
		}
	}
}
