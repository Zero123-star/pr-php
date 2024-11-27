<?php
session_start();
$host = "localhost";
$db = "companietransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
$nume=$_POST['nume'];
$parola=$_POST['pas1'];
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->query("Select id from utilizator where parola='$parola' and nume='$nume'");
$delta = $aux->fetch_row();
if($delta==null)
{
echo "Eroare, date gresite!";
}
else
{
$pas = $delta[0];
$_SESSION['id']=$pas;
$_SESSION['logged'] = true;
$_SESSION['user'] = $nume;
header("Location: Postari.php");
}
exit;
?>