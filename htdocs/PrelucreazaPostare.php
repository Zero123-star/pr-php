<?php
session_start();
if (!isset($_SESSION['logged']) || !isset($_SESSION['id'])) {
    echo "Erroare! Nu esti logat/utilizator gresit!";
    header("Location: Init.php");
    exit;
}
$host = "localhost";
$db = "companietransport";
$usr = "root";
$pas1 = "";
$suma = $_POST['val'];
$adresa = $_POST['adresa'];
$titlu = $_POST['titlu'];
$desc = $_POST['desc'];
$desc=nl2br(htmlspecialchars($desc));//Speram ca va face <br>
$id = $_SESSION['id'];
$conn = new mysqli($host, $usr, $pas1, $db);
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->query("Select count(*) from postare");
$delta = $aux->fetch_row();
$beta = $delta[0];
$beta += 1;
echo $_SESSION['id'] . $suma . $adresa . $titlu . $desc . $id . $beta;
$conn->query("Insert into postare(idpostare,creator_id,adresa,descriere_postare,
nume_postare,oferta) values($beta,$id,'$adresa','$desc','$titlu',$suma)");
if ($conn->error)
    echo "Eroare comanda?";
else
    echo "Postare inregistrata in data de baze!";
?>