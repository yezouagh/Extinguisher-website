<?php


// CHANGE THE VARIABLES BELOW


if($_POST['email']!="")
{
$EmailFrom = "From: younes.azouagh@gmail.com" . "\r\n" .
"CC: extincteurs.alkhair@gmail.com";

$EmailTo = "extincteurs.alkhair@gmail.com";

$Subject = "Contact Form Submission :".Trim(stripslashes($_POST['subject']));


$Name = Trim(stripslashes($_POST['name']));
$Email = Trim(stripslashes($_POST['email']));

$Message = Trim(stripslashes($_POST['message'])); 


// prepare email body text

$Body = "";
$Body .= "Name: ";

$Body .= $Name;
$Body .= "\n\n";

$Body .= "\n";
$Body .= "Email: ";

$Body .= $Email;
$Body .= "\n\n\n";

$Body .= "Message: ";
$Body .= $Message;

$Body .= "\n\n";


$success =mail($EmailTo, $Subject, $Body,$EmailFrom);
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.html\">";
}

else
{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
}
else
{
print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}

?>