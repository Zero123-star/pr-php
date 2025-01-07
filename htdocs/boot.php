<?php
session_start();

if (!isset($_SESSION['id']))
    header("Location: Init.php");

if (!isset($_SESSION['cod']))
    $_SESSION['cod'] = bin2hex(random_bytes(32));


$_SESSION['bypass']=0;    
if($_SESSION['rol']=='administrator' || $_SESSION['rol']=='moderator')
$_SESSION['bypass']=1;
/*
if ($_SERVER['HTTPS'] != 'on') {
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $https_url);
    exit;
}
header("Content-Security-Policy: default-src 'self'");
*/require_once 'db.php';

//Ban checker//

$aux=$conn->prepare("select count(*) from Suspended where userid = ? and enddate > NOW()");
$aux->bind_param('i',$_SESSION['id']);
$aux->execute();
$aux=$aux->get_result();
$mn=$aux->fetch_array();
if($mn[0]>0)
header("Location: banned.php");
function comparecod($cod1, $cod2)
{
    return hash_equals($cod1, $cod2);
}
;


?>