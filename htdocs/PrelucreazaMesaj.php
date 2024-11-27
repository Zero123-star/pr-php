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
$nume = $_POST['val'];
$desc = $_POST['desc'];
echo $nume . $desc;
$desc = nl2br(htmlspecialchars($desc));//Speram ca va face <br>
$id = $_SESSION['id'];
$conn = new mysqli($host, $usr, $pas1, $db);
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->query("Select count(*) from Mesaj");
$delta = $aux->fetch_row();
$beta = $delta[0];
$beta += 1;
echo $beta;
$aux = $conn->query("Select id from utilizator where nume='$nume'");
if($aux==null)
{   echo "Nu am gasit numele cerut!";
    exit;
}
    //echo "al";
$gamma = $aux->fetch_row(); //Da stiu, daca vor fi mai multi utilizatori cu acelasi
//nume o sa puna la primul care il gaseste in select, va trebui sa fixez asta
if ($gamma != null) {
    $mnp = $gamma[0];
    $conn->query("Insert into Mesaj(mesajid,senderid,receiverid,descriere) values($beta,$id,$mnp,'$desc')");
    if ($conn->error)
        echo "Eroare comanda?";
    else
        echo "Mesaj trimis cu succes!";
}
else 
{
    echo "Nu am putut trimite mesajul, nu exista o persoana cu numele dat!";
}
?>