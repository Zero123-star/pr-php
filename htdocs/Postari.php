<?php 
require_once 'boot.php';
if(!isset($_SESSION['id']))
header("Location: Init.php");



echo "Esti conectat ca si: " . $_SESSION['user'] . " " . $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Postari</title>
</head>
<body>
<div>
<a href="CreazaPostare.php">CreazaPostare</a>
</div>
<div>
<a href="logout.php">Logout</a>
</div>
<div>
<a href="StergePostare.php">PostarileTale</a>
</div>
<div>
<?php 
if($_SESSION['rol']=='moderator' || $_SESSION['rol']){
?>
<div>
<a href="administrator.php">(AdminOnly)Meniu</a>  
</div>
<?php
}
?>
<a href="CreazaMesaj.php">TrimiteMesaj</a>
</div>
    <h1>MesajePrimite</h1>
    <ul>
    <?php 
        $usrid=$_SESSION['id'];
        $aux = $conn->prepare("Select mesajid from Mesaj where receiverid=?");
        $aux->bind_param("i",$usrid);
        $aux->execute();
        $auxi=$aux->get_result();
        while($alpha = $auxi->fetch_row())
        {
            $id=$alpha[0];
            ?>
            <li><?php echo "<a href=mesaj.php?id=" . $id . ">Mesaj</a>" ?></li>
        <?php        
        }
         ?>
    </ul>

    <h1>Postari</h1>
    <ul>
        <?php 
        $aux = $conn->query("Select idPostare,nume_postare from postare");
        while($alpha = $aux->fetch_row())
        {
            $id=$alpha[0];
            $titl=$alpha[1];
            ?>
            <li><?php echo "<a href=order.php?id=" . $id . ">" . $titl . "</a>" ?></li>
        <?php        
        }
         ?>
    </ul>
</body>
</html>