<?php
$id = $_GET["id"];
$host = "localhost";
$db = "companietransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
$aux = $conn->query("Select senderid,descriere from Mesaj where mesajid=$id");
$be = $aux->fetch_row();
$id2=$be[0];
$aux = $conn->query("Select nume from utilizator where id=$id2");
$id2=$aux->fetch_row();
echo "Ai primit urmatorul mesaj de la " . $id2[0] . " :<br>";
echo $be[1];
?>