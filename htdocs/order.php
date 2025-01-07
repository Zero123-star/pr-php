
<html>
<?php
require_once 'boot.php';
$id = $_GET["id"];
$idutilizator = $_SESSION['id'];
//echo $_SESSION['id'] . "este idul utilizatorului curent!";
$aux = $conn->query("Select * from postare where idpostare=$id");
$be = $aux->fetch_row();
$num=0;
//TODO: sa dau direct un fetch assoc, codul asta nu e flexibil
for ($i = 2; $i < sizeof($be)-1; $i++) {
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

$i=3;
$aux=$conn->query("Select u.nume nume,f.valoare valoare from Oferta f,utilizator u where f.postareid=$id and f.userid=u.id");
$b='1';
$b=$aux->fetch_assoc();
while($b!=null)
{
echo $b['nume'] . " ofera: " . $b['valoare'] . "lei";
echo "<br>";
$b=$aux->fetch_assoc();
}


if($be[1]==$idutilizator || $_SESSION['rol']=='moderator' || $_SESSION['rol']=='administrator'){
    $mn="stergeorder.php?id=" . $id;
?>
<a href="<?php echo $mn?>">Sterge postare!</a>
<?php
}
?>
<?php 
if($_SESSION['rol']=='curier' && $be[6]==0)
{
?>
<form method="POST" action="processoffer.php?id=<?php echo $id ?>">
<input type="hidden" name="cod" value="<?php echo $_SESSION['cod']?>">
Oferta:<input type="number" name="val" required>
<input type="submit">
</form>
<?php
}
?>
<a href="makeorderpdf.php?<?php echo "id=$id" ?>">Creeaza pdf</a>
<br>
<?php 
if($be[1]==$_SESSION['id'] && $be[6]==0)//Esti creatorul postarii si inca nu e inchisa
{
?>
<form method="POST" action="parsare/endoffer.php?id=<?php echo $id ?>">
Inchide postarea si alege curier: <input type="text" name="util" required>
<input type="submit" value="trimite">
</form>
<?php 
}

?>
<?php 
if ($be[6]==1){
echo "<br><br>Postare inchisa!";


} 


?>
</html>