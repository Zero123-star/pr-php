<?php
session_start();
$cap=substr(str_shuffle("asdawdwefiuroviheoiwjfoiqwnkkbsgbnrt123"),0,6);
$_SESSION['cap']=$cap;
$img=imagecreate(125,125);
$wh=imagecolorallocate($img,255,255,255);
imagefill($img,0,0,$wh);
$col=imagecolorallocate($img,0,0,0);
for($i=0;$i<=10;$i++)
imageline($img,rand(0,125),rand(0,125),rand(0,125),rand(0,125),$col);

imagettftext($img,15,rand(0,30),rand(10,60),rand(40,80),$col,'font.ttf',$cap);
header("Content-Type: Image");
imagepng($img);

//echo $cap;


?>