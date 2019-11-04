<?
//https://www.php.net/manual/en/function.mail.php
//


//turn on the error reporting
Error_Reporting(E_ALL & ~E_NOTICE);

//assign variables
reset($post_vars);
$message='';

if (isset($_REQUEST["demo-name"])) {$name = $_REQUEST["demo-name"]; }
if (isset($_REQUEST["demo-email"])) {$email = $_REQUEST["demo-email"]; }
if (isset($_REQUEST["demo-message"])) {$message = $_REQUEST["demo-message"]; }
if (isset($_REQUEST["Phone"])) {$phonenumber = $_REQUEST["Phone"]; }

//construct email required parameters from variables
//https://help.smallbusiness.yahoo.net/s/article/SLN20689 - Why won't my PHP script send email?
$headers= "From:  \n";
//$headers= "From: ". $email ." \n";
$headers.= 'Content-type: text/html; charset=iso-8859-1';
//$subject= " ".$_REQUEST['Name'] ;
$subject= "[MBN Contact Form] From ".$_REQUEST['demo-name'] ;
//$subject= "[Hookstream Contact Form] From ".$_REQUEST['Name'] ;
$message.= " \n <br><br>" . $phonenumber;
//issue the command to send the email
mail('', $subject,  "
<html>
<head>
 <title>MBN Contact letter</title>
</head>
<body>
<br>
  ".$message."
</body>
</html>" , $headers);

//if we get to this point then there has been no errors and the email has been sent
echo ("Thank you for your message. It was successfully sent.");
echo $message . "message";
echo $subject . "subject";
echo $email . "email";
echo $phonenumber . "phonenumber";

?>

<!-- change the size of the window to show that something was done visually -->
<script>
	resizeTo(800, 600);
</script>
