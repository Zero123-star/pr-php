
<html>
<?php
session_start();
$id = $_GET["id"];
$idutilizator = $_SESSION['id'];
$host = "localhost";
$db = "CompanieTransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
$aux = $conn->query("Select * from postare where idpostare=$id");
$be = $aux->fetch_row();
$num=0;
if($be[1]!=$idutilizator)
{
    echo "Eroare! Utilizator gresit!";
    header("Location: Postari.php");
}
else 
{
    $conn->query("delete from postare where idpostare=$id");
    echo "Postare eliminata cu succes!";
    //header("Location: Postari.php");

}
?>