<?php
session_start();
$pas = $_POST["pas1"];
$nume = $_POST["nume"];
$email = $_POST["email"];
$host = "localhost";
$db = "companietransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->query("Select * from utilizator where parola='$pas' and nume='$nume'");
$delta = $aux->fetch_row();
$aux2 = $conn->query("Select count(*) from utilizator");
$Beta = $aux2->fetch_column();
$Beta+=1;
if($delta==null)
{
$conn->query("Insert into utilizator(email,id,nume,parola,rol) values ('$email',$Beta,'$nume','$pas','Utilizator')");
echo "Utilizatorul a fost inregistrat cu succes!";
}
else
echo "Deja exista un utilizator cu datele trimise!";
?>