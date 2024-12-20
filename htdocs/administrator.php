<?php
require_once 'boot.php';

$id = $_SESSION['id'];
$aux = $conn->prepare("select * from utilizator where id=?");
$aux->bind_param('i', $id);
$aux->execute();
$aux3 = $aux->get_result();
$aux2 = $aux3->fetch_assoc();
if ($aux2['rol'] == 'administrator' || $aux2['rol'] == 'moderator')
    echo "Esti conectat ca si un " . $aux2['rol'];
else
    header("Location: Init.php");
if (!isset($_POST['aprox']))
    $_POST['aprox'] = "";//Daca inca nu are nici o valoare aproximarea atunci o sa fie vida
$aprox = $_POST['aprox'] . "%";//ca sa nu se intample nush ce in linia asta cu null + "%"
$aux = $conn->prepare("select * from utilizator where nume like ?");
echo $aprox;
$aux->bind_param("s", $aprox);
$aux->execute();
$aux = $aux->get_result();
$b = "1";
?>

<!DOCTYPE html>
<body>
    <form method="POST">
        <label for="filter">Cauta dupa nume:</label>
        <input type="text" id="filter" name="aprox">
        <button type="submit">Filter</button>
    </form>
    <form action="actualizeaza.php" method="POST">
        <select name="id" size="10">
            <?php while ($b != null) {
                $b = $aux->fetch_assoc();
                echo $b['id'] . "<br>";
                ?>
                <option value="<?= htmlspecialchars($b['id']) ?>"><?= htmlspecialchars($b['nume']) ?></option>
            <?php } ?>
        </select>
        <select name="action" size="5" required>
            <option value="Suspend">Temporary ban</option>
            <option value="Mdriver">Make curier</option>
            <option value="Muser">Make utilizator</option>
            <?php
            if ($aux2['rol'] == 'administrator') {
                echo "<option value=" . "Mmoderator" . ">Make moderator(Admin only)</option>";
                echo "<option value=" . "Dmoderator" . ">Demote moderator(Admin only)</option>";
                echo "<option value=" . "PermBan" . ">Permanent ban(Admin only)</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>

</html>