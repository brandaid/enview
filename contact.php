<?php
function check_email($email) {
	if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        return false;
    }
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false;
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
}

	if(isset($_POST['action']) && $_POST['action']=='send_form'){
		$return_val['status']='false';
		$email_verif=check_email($_POST['email']);
		
		if($email_verif==false){ $return_val['message']='Incorrect email.'; }
		if($_POST['first_name']!="" && $_POST['last_name']!="" && $_POST['email']!="" && $email_verif==true){
			$to  = 'info@enview.com';
			$subject = 'Site contact form';
			$message = '
			<html>
			<head>
			  <title>Site contact form</title>
			</head>
			<body>
				<h2>Data sent</h2>
				<b>First name</b>: '.$_POST['last_name'].'<br />
				<b>Last name</b>: '.$_POST['first_name'].'<br />
				<b>Email</b>: '.$_POST['email'].'<br />
				<b>Company</b>: '.$_POST['company'].'<br />
				<b>Message</b>: '.$_POST['comment'].'
			</body>
			</html>
			';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'To: Test <info@enview.com>' . "\r\n";
			$headers .= 'From: Site <site@enview.com>' . "\r\n";
			if(mail($to, $subject, $message, $headers)) $return_val['status']=true;
			else{
				$return_val['message']='Email was not sent!';
			}
		}
		echo json_encode($return_val);
	}
?>