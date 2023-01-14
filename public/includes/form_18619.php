<?php	
	if (empty($_POST['name_49815_18619']) && strlen($_POST['name_49815_18619']) == 0 || empty($_POST['input_1386_49815_18619']) && strlen($_POST['input_1386_49815_18619']) == 0 || empty($_POST['email_49815_18619']) && strlen($_POST['email_49815_18619']) == 0 || empty($_POST['input_2372_49815_18619']) && strlen($_POST['input_2372_49815_18619']) == 0)
	{
		return false;
	}
	
	$name_49815_18619 = $_POST['name_49815_18619'];
	$input_1386_49815_18619 = $_POST['input_1386_49815_18619'];
	$email_49815_18619 = $_POST['email_49815_18619'];
	$input_2372_49815_18619 = $_POST['input_2372_49815_18619'];
	$optin_49815_18619 = $_POST['optin_49815_18619'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from a Blocs website.";
	$email_body = "You have received a new message. \n\n".
				  "Name_49815_18619: $name_49815_18619 \nInput_1386_49815_18619: $input_1386_49815_18619 \nEmail_49815_18619: $email_49815_18619 \nInput_2372_49815_18619: $input_2372_49815_18619 \nOptin_49815_18619: $optin_49815_18619 \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\r\n";
	$headers .= "Reply-To: $email_49815_18619";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>