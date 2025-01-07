<?php
require_once "../boot.php";
echo "Camioanele ce sunt disponibile pentru curierii nostri: <br> <br> <br>";
$url = "https://www.dacoda.ro/tipuri-de-camioane/";
$html = file_get_contents($url);
$uni1 = '<strong>Dube</strong>'; 
$uni2='<strong>Camioane jumbo, cu prelata</strong>';
$startpos = strpos($html, $uni1);
$endpos = strpos($html, $uni2);
$endpos-=1;
$contentFromMiddle = substr($html, $startpos,$endpos-$startpos);
echo $contentFromMiddle;
?>

