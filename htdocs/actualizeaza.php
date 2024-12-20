<?php
require_once 'boot.php';
echo $_POST['id'] . " " . $_POST['action'];
if (!isset($_POST['id']) || !isset($_POST['action']))
    header("Location: adminstrator.php");
$id1 = $_POST['id'];
$action = $_POST['action'];
//Mmoderator
//Muser
//Mdriver
//Suspend
//Dmoderator
//PermBan
$id = $_SESSION['id'];
$auxi = $conn->query("Select * from utilizator where id=$id1");
$aux = $auxi->fetch_assoc();
echo $aux['rol'];
if (($aux['rol'] == 'moderator' || $aux['rol'] == 'administrator') && $_SESSION['rol'] == 'moderator') {
    echo "Nu poti modifica un alt administrator ca si moderator!";
} 
elseif ($aux['rol'] == 'administrator') {
    echo "Nu poti sa modifici un administrator ca si un admin!" . $aux['rol'] . " " . $_SESSION['rol'];
} else {
    if ($action == 'Mmoderator')
        $conn->query("Update utilizator set rol='moderator' where id=$id1");
    elseif
    ($action == 'Muser')
        $conn->query("Update utilizator set rol='utilizator' where id=$id1");
    elseif
    ($action == 'Mdriver')
        $conn->query("Update utilizator set rol='curier' where id=$id1");
    elseif
    ($action == 'Dmoderator')
        $conn->query("Update utilizator set rol='Utilizator' where id=$id1");
    elseif
    ($action == 'PermBan') {
        $begin=date('Y-m-d');
        $end= date('Y-m-d',strtotime('+70 years'));
        $as=$conn->query("select count(*) from Suspended");
        $m=$as->fetch_row();
        $mn=$m[0]+1;
        //echo '1';
        $conn->query("Insert into Suspended(bandate,enddate,susid,userid) values('$begin','$end',$mn,$id1)");
        echo "Utilizator banned succesfully!";
    }
    elseif
    ($action == 'Suspend') {
        $begin=date('Y-m-d');
        $end= date('Y-m-d',strtotime('+7 days'));
        $as=$conn->query("select count(*) from Suspended");
        $m=$as->fetch_row();
        $mn=$m[0]+1;
        //echo '1';
        $conn->query("Insert into Suspended(bandate,enddate,susid,userid) values('$begin','$end',$mn,$id1)");
        echo "Utilizator suspended succesfully!";
    }
}
?>