<html>
<?php 
session_start();
echo "Esti conectat ca si: " . $_SESSION['user'];
$host = "localhost";
$db = "CompanieTransport";
$usr = "root";
$pas1 = "";
$idutilizator=$_SESSION['id'];
$conn = new mysqli($host, $usr, $pas1, $db);
$aux = $conn->query("Select idPostare,nume_postare from postare where creator_id=$idutilizator");
while($alpha = $aux->fetch_row())
        {
            $id=$alpha[0];
            $titl=$alpha[1];
            ?>
            <li><?php echo "<a href=order.php?id=" . $id . ">" . $titl . "</a>" ?></li>
        <?php
        } ?>

</html>

