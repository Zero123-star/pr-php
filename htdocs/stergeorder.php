
<html>
<?php

require_once 'boot.php';
$id = $_GET["id"];
$idutilizator = $_SESSION['id'];
$aux = $conn->query("Select * from postare where idpostare=$id");
$be = $aux->fetch_row();
$num=0;
$poatebana=0;
if($_SESSION['rol']=='moderator' || $_SESSION['rol']=='administrator')
$poatebana=1;
//echo "hoi";
if($be[1]!=$idutilizator){
if($poatebana==0)
{
    echo "Eroare! Utilizator gresit!";
    echo $be[1] . " " . $_SESSION['rol'];
    //header("Location: Postari.php");
    exit;
}
}
    echo "Deleting any offers...";
    $conn->query("delete from Oferta where postareid=$id");//elimin intai ofertele
    echo "\n Succesfully deleted them... deleting post...";
    $conn->query("delete from postare where idpostare=$id");
    echo "\n Postare eliminata cu succes!";
    //header("Location: Postari.php");


?>