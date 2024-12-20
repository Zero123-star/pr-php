<?php
session_start();
require_once 'db.php';
$parola=$_POST['pas1'];
$nume=$_POST['nume'];
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->prepare("Select * from utilizator where parola=? and nume=?");
$aux->bind_param('ss',$parola,$nume);
$aux->execute();
$aux=$aux->get_result();
$delta = $aux->fetch_assoc();
if($delta==null)
{
echo "Eroare, date gresite!";
}
else
{
$pas = $delta['id'];
$_SESSION['id']=$pas;
$_SESSION['logged'] = true;
$_SESSION['user'] = $nume;
$_SESSION['rol'] = $delta['rol'];
header("Location: Postari.php");
}
exit;
?>