<?php
require_once 'boot.php';
$rs = comparecod($_SESSION['cod'], $_POST['cod']);
if ($rs == 0)
    header("Location: Init.php");
$id = $_GET["id"];
$idutilizator = $_SESSION['id'];
$aux = $conn->prepare("Select * from postare where idpostare=?");
$aux->bind_param('i', $id);
$aux->execute();
$aux = $aux->get_result();
$mn = $aux->fetch_assoc();
if ($mn == null) {
    echo "Nu exista postarea data!";
    
    Header("Location: Postari.php");
}
echo "here";
//echo "Select * from Oferta where userid=$idutilizator";
$aux = $conn->prepare("Select * from Oferta where userid=? and postareid=?");
$aux->bind_param('ii', $idutilizator,$id);
$aux->execute();

echo"123";
$aux = $aux->get_result();
$mn = $aux->fetch_assoc();
if ($mn == null) {
    echo "double";
    $aux = $conn->query("Select count(*) from Oferta");
    $mna = $aux->fetch_array();
    $nr = $mna[0] + 1;
    $val=$_POST['val'];
    echo "Insert into Oferta values ($nr, $id, $idutilizator, $val)";
    $aux = $conn->prepare("Insert into Oferta(oftertaid,postareid,userid,valoare) values (?,?,?,?)");
    $aux->bind_param("iiii", $nr, $id, $idutilizator, $_POST['val']);
    $aux->execute();
    header("Location: order.php?id=$id");
} else {
    $aux = $conn->prepare("Update Oferta set valoare=? where userid=? and postareid=?");
    $aux->bind_param("iii", $_POST['val'], $idutilizator, $id);
    $aux->execute();
    header("Location: order.php?id=$id");
}

?>