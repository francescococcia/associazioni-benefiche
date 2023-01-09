<?php	
	if (empty($_POST['email']) && strlen($_POST['email']) == 0 || empty($_POST['input_2372']) && strlen($_POST['input_2372']) == 0)
	{
		return false;
	}
	
	$email = $_POST['email'];
	$input_2372 = $_POST['input_2372'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from a Blocs website.";
	$email_body = "You have received a new message. \n\n".
				  "Email: $email \nInput_2372: $input_2372 \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\r\n";
	$headers .= "Reply-To: $email";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>