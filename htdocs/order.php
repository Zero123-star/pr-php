
<html>
<?php
session_start();
$id = $_GET["id"];
$idutilizator = $_SESSION['id'];
//echo $_SESSION['id'] . "este idul utilizatorului curent!";
$host = "localhost";
$db = "CompanieTransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
$aux = $conn->query("Select * from postare where idpostare=$id");
$be = $aux->fetch_row();
$num=0;
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

$i=3;
echo $idutilizator;
if($be[1]==$idutilizator){
    $mn="stergeorder.php?id=" . $id;
?>
<a href="<?php echo $mn?>">Sterge postare!</a>
<?php
}
?>
</html>