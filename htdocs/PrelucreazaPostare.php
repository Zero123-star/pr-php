<?php
require_once 'boot.php';
if (!isset($_SESSION['logged']) || !isset($_SESSION['id'])) {
    echo "Erroare! Nu esti logat/utilizator gresit!";
    header("Location: Init.php");
    exit;
}
//echo $_POST['cod'];
$rs=comparecod($_SESSION['cod'],$_POST['cod']);
if($rs==0)
header("Location: Init.php");
if($_POST['capt']!=$_SESSION['cap'])
{
    echo "Captcha incorrect!";
    exit;
    //header("Location: banned.php");
}
$suma = $_POST['val'];
$adresa = $_POST['adresa'];
$titlu = $_POST['titlu'];
$desc = $_POST['desc'];
$desc=nl2br(htmlspecialchars($desc));//Speram ca va face <br>
$id = $_SESSION['id'];
if ($conn->error)
    echo "Eroare conectare data de baze. Revino mai tarziu";
$aux = $conn->query("Select count(*) from postare");
$delta = $aux->fetch_row();
$beta = $delta[0];
$beta += 1;
echo $_SESSION['id'] . $suma . $adresa . $titlu . $desc . $id . $beta;
$auxi=$conn->prepare("Insert into postare(idpostare,creator_id,adresa,descriere_postare,
nume_postare,oferta) values(?,?,?,?,?,?)");
$auxi->bind_param('iisssi',$beta,$id,$adresa,$desc,$titlu,$suma);
$auxi->execute();
//echo "a";
if ($conn->error)
    echo "Eroare comanda?";
else
    echo "Postare inregistrata in data de baze!";
?>