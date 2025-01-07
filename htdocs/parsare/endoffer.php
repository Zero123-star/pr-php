<?php
require_once "../boot.php";
$id = $_GET["id"];
$curier=$_POST['util'];
$idutilizator = $_SESSION['id'];
$aux = $conn->prepare("Select * from postare where idpostare=?");
$aux->bind_param('i', $id);
$aux->execute();
$aux = $aux->get_result();
$mn = $aux->fetch_assoc();
if ($mn == null || $mn['creator_id']!=$_SESSION['id']) {
    echo "Eroare, utilizator gresit / postare nu exista!";
    exit;
    //Header("Location: Postari.php");
}
$aux = $conn->prepare("Select * from utilizator where nume=?");
$aux->bind_param('s', $curier);
$aux->execute();
$aux = $aux->get_result();
$mn2 = $aux->fetch_assoc();
if($mn2==null)
{
echo "Eroare, nume curier gresit!";
exit;

}
$mailcurier=$mn2['email'];
$idutilizator=$mn2['id'];

$aux = $conn->prepare("Select * from Oferta where userid=? and postareid=?");
$aux->bind_param('ii', $idutilizator,$id);
$aux->execute();
$aux = $aux->get_result();
$mn3 = $aux->fetch_assoc();
if($mn3==null)
{
echo "Eroare, curierul nu a facut nici o oferta!";
exit;
}
$suma = $mn3['valoare'];
$aux = $conn->prepare("update postare set oferta=?, inchisa=1 where idpostare=?");
$aux->bind_param('ii', $suma,$id);
$aux->execute();

//// Trimite mesaj automat de confirmare

$mn="Tocmai ai confirmat postarea ta cu curierul $curier, si cu suma necesara $suma.
order.php?id=$id";
$mn2="Felicitari! Ai contract cu suma de $suma.
order.php?id=$id";




$p1=$conn->query("Select max(ifnull(mesajid, 2)) as mesajid from Mesaj");
$p1=$p1->fetch_assoc();
$nr1=$p1['mesajid'];
$nr1+=1;

$conn->query("Insert into Mesaj(mesajid,receiverid,senderid,descriere)
values ($nr1,$idutilizator,1,'$mn2')");
$nr1+=1;
$id2=$_SESSION['id'];
$conn->query("Insert into Mesaj(mesajid,receiverid,senderid,descriere)
values ($nr1,$id2,1,'$mn')");
echo "Mesaje trimise cu succes!";
//// Trimite mesaj automat de confirmare 

//// Trimite mail catre curier
//Shamelessly copied from mail() php library example.
$to      = $mailcurier;
$subject = 'Confirmare comanda';
$message = $mn2;
$headers = 'From: transport@gigel.com' . "\r\n" .
    'Reply-To: transport@gigel.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);


?>