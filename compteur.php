<?php

//$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 

                //=== FALSE ? 'http' : 'https';
//$host     = $_SERVER['HTTP_HOST'];
//$script   = $_SERVER['SCRIPT_NAME'];
//$currentUrl = $protocol . '://' . $host . $script ;

$MonIp=$societe['IP'];
//echo $currentUrl;

$monfichier = fopen('compteur.txt', 'r+');
$pages_vues=intval(fgets($monfichier));

if($MonIp!=$_SERVER['REMOTE_ADDR']){
$pages_vues +=1;
fseek($monfichier, 0);
fputs($monfichier, $pages_vues);
fclose($monfichier);
}
