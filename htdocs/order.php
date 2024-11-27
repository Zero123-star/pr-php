<?php

$id = $_GET["id"];
$host = "localhost";
$db = "companietransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
$aux = $conn->query("Select * from postare where idpostare=$id");
$be = $aux->fetch_row();
for ($i = 2; $i < sizeof($be); $i++) {
    switch ($i) {
        case 2:
            echo "Titlu: ";
            break;
        case 3:
            echo "Descriere: ";
            break;
        case 4:
            echo "Suma oferita: ";
            break;
        case 5:
            echo "Adresa: ";
            break;
    }
    echo $be[$i];
    echo "<br>";
}
?>