<html>
<?php 
require_once 'boot.php';
echo "Esti conectat ca si: " . $_SESSION['user'];
$idutilizator=$_SESSION['id'];
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

