<?php
if (isset($_POST['submit']) and isset($_POST['email'])) {
if ($_POST['email'] != "") 
{  
   $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL); 
 
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{  
                $result = "The mail you entered is not a valid email address.";
		} 
		else
		{
		$link = mysqli_connect('localhost','root','123');
		mysqli_select_db($link,'newsletter'); 	
		$sql = 'INSERT INTO newsletter SET email = "' . $email . '"';
		$sql1 = 'SELECT email FROM newsletter WHERE email = "'.$email.'"';

			if (mysqli_query ($link, $sql1) == true) 
			{
			$result = "Your email is alredy registered.";
			}
			else
			{
			if (mysqli_query ($link, $sql)) 
			{
			$result = "Your email has been successfully registered. Thanks for your interest in SABF!";
			}
			}
} 
}
else 
{  
    $result = 'Please enter your email address.'; 
}
}
?>