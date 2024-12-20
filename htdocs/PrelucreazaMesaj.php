<?php
require_once 'boot.php';
if (!isset($_SESSION['logged']) || !isset($_SESSION['id'])) {
    echo "Erroare! Nu esti logat/utilizator gresit!";
    header("Location: Init.php");
    exit;
}
if(comparecod($_SESSION['cod'],$_POST['cod'])==0)
header("Location: Init.php");
$nume = $_POST['val'];
$desc = $_POST['desc'];
echo $nume . $desc;
$desc = nl2br(htmlspecialchars($desc));//Speram ca va face <br>
$id = $_SESSION['id'];
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->query("Select count(*) from Mesaj");
$delta = $aux->fetch_row();
$beta = $delta[0];
$beta += 1;
echo $beta;
$aux = $conn->prepare("Select id from utilizator where nume=?");
$aux->bind_param('s', $nume);
$aux->execute();
$fericire = $aux->get_result();
if ($fericire == null) {
    echo "Nu am gasit numele cerut!";
    exit;
}
echo "al";
$gamma = $fericire->fetch_row(); //Da stiu, daca vor fi mai multi utilizatori cu acelasi
//nume o sa puna la primul care il gaseste in select, va trebui sa fixez asta
if ($gamma != null) {
    $mnp = $gamma[0];
    echo "es";
    $auxi = $conn->prepare("Insert into Mesaj(mesajid,senderid,receiverid,descriere) values(?,?,?,?)");
    $auxi->bind_param('iiis', $beta, $id, $mnp, $desc);

    $auxi->execute();
    if ($conn->error)
        echo "Eroare comanda?";
    else
        echo "Mesaj trimis cu succes!";
} else {
    echo "Nu am putut trimite mesajul, nu exista o persoana cu numele dat!";
}
?>