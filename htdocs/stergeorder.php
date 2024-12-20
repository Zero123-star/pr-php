
<html>
<?php
require_once 'boot.php';
$id = $_GET["id"];
$idutilizator = $_SESSION['id'];
$aux = $conn->query("Select * from postare where idpostare=$id");
$be = $aux->fetch_row();
$num=0;
if($be[1]!=$idutilizator && ($_SESSION['rol']!='moderator' || $_SESSION['rol']!='administrator'))
{
    echo "Eroare! Utilizator gresit!";
    header("Location: Postari.php");
}
else 
{   $conn->query("delete from Oferta where postareid=$id");//elimin intai ofertele
    $conn->query("delete from postare where idpostare=$id");
    echo "Postare eliminata cu succes!";
    //header("Location: Postari.php");

}
?>