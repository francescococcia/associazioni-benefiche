<?php	
	if (empty($_POST['name_49815']) && strlen($_POST['name_49815']) == 0 || empty($_POST['input_1386_49815']) && strlen($_POST['input_1386_49815']) == 0 || empty($_POST['email_49815']) && strlen($_POST['email_49815']) == 0 || empty($_POST['input_2372_49815']) && strlen($_POST['input_2372_49815']) == 0)
	{
		return false;
	}
	
	$name_49815 = $_POST['name_49815'];
	$input_1386_49815 = $_POST['input_1386_49815'];
	$input_82 = $_POST['input_82'];
	$email_49815 = $_POST['email_49815'];
	$input_2372_49815 = $_POST['input_2372_49815'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from a Blocs website.";
	$email_body = "You have received a new message. \n\n".
				  "Name_49815: $name_49815 \nInput_1386_49815: $input_1386_49815 \nInput_82: $input_82 \nEmail_49815: $email_49815 \nInput_2372_49815: $input_2372_49815 \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\r\n";
	$headers .= "Reply-To: $email_49815";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>