<?php
session_start();
$pas = $_POST["pas1"];
$nume = $_POST["nume"];
$email = $_POST["email"];
require_once '../db.php';
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->prepare("Select * from utilizator where nume=?");
$aux->bind_param('s',$nume);
$aux->execute();
$aux=$aux->get_result();
$delta = $aux->fetch_row();
$aux2 = $conn->query("Select max(ifnull(id,2)) from utilizator");
$Beta = $aux2->fetch_column();
$Beta+=1;
if($delta==null)
{
$aux=$conn->prepare("Insert into utilizator(email,id,nume,parola,rol) values (?,?,?,?,'Utilizator')");
//echo "Insert into utilizator(email,id,nume,parola,rol) values ($email,$Beta,$nume,$pas,'Utilizator')";
$aux->bind_param('siss',$email,$Beta,$nume,$pas);

echo "Insert into utilizator(email,id,nume,parola,rol) values ($email,$Beta,$nume,$pas,'Utilizator')";
$aux->execute();
echo "Utilizatorul a fost inregistrat cu succes!";
}
else
echo "Deja exista un utilizator cu datele trimise!";
?>
