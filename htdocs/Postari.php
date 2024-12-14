<?php 
session_start();
echo "Esti conectat ca si: " . $_SESSION['user'] . " " . $_SESSION['id'];
$host = "localhost";
$db = "CompanieTransport";
$usr = "root";
$pas1 = "";
$conn = new mysqli($host, $usr, $pas1, $db);
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
<a href="StergePostare.php">StergePostare</a>
</div>
<a href="StergeMesaj.php">StergeMesaj</a>
<div>
<a href="CreazaMesaj.php">TrimiteMesaj</a>
</div>
    <h1>MesajePrimite</h1>
    <ul>
    <?php 
        $usrid=$_SESSION['id'];
        $aux = $conn->query("Select mesajid from Mesaj where receiverid=$usrid");
        while($alpha = $aux->fetch_row())
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