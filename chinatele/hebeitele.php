<?php
//127.0.0.1/hebeitele1.php
//id=1  4
header( 'Content-Type: text/plain; charset=UTF-8');
ini_set("max_execution_time", "3000000");
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '512M'); // 或更高，如 1024M
//$id=$_GET['id'];
//$urlk="http://192.168.10.1/hebeitele.txt";

$urlk="http://127.0.0.1//hebeitele.txt";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$urlk);
//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
//curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0');
$file_content=curl_exec($ch);
curl_close($ch);
//print $rek;


preg_match_all('/ChannelName="(.*?)",/i',$file_content,$uu,PREG_SET_ORDER);//频道名称
preg_match_all('/ChannelURL="(.*?)\|/i',$file_content,$uk,PREG_SET_ORDER);//频道组播地址
preg_match_all('/\|(.*?)",/i',$file_content,$um,PREG_SET_ORDER);//频道单播地址
//preg_match_all('/TimeShiftURL\=\"(.*?)\|/i',$rek,$un,PREG_SET_ORDER);//频道组播地址
//print_r($uu);
//print_r($uk);
//print_r($um);
header("Content-Disposition: attachment; filename=hebeitele.m3u");
//print "#EXTM3U  \r\n";
print "#EXTM3U url-tvg=\"https://raw.githubusercontent.com/zzq1234567890/epg/refs/heads/main/epgziyong.xml.gz\" catchup=\"append\" catchup-source=\"?playseek=\${(b)yyyyMMddHHmmss\}-\${(e)yyyyMMddHHmmss}\" \r\n";

for ( $i=1 ; $i<=count($uu) ; $i++ ) {


print "#EXTINF:-1 tvg-id=\"".$uu[$i-1][1]."\" tvg-name=\"".$uu[$i-1][1]."\" tvg-logo=\"\" group-title=\"hebeitele\",".$uu[$i-1][1]."\r\n";
//print "".$um[$i-1][1]."\r\n";
print "".$uk[$i-1][1]."\r\n";

}


?>





