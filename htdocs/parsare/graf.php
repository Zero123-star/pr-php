<?php
require_once "../boot.php";
$auxis=$conn->query("Select rol, count(*) from utilizator group by rol");
//$auxi=$auxis->fetch_assoc();
$aux1=$conn->query("Select count(*) as postari from postare");
$aux1 = $aux1->fetch_assoc();
while($mn=$auxis->fetch_row())
{$nr = $mn[0];
  //echo $nr;
    $auxi[$nr]=$mn[1];
}
//echo $auxi['Utilizator'] . "," . $auxi['curier'] . "," . 
//$auxi['administrator'] . "," . $aux1['postari'] . "\n";
echo $auxi['Utilizator'] . "," . $auxi['curier'] . "," . $auxi['moderator'] . "," . 
$auxi['administrator'] . "," . $aux1['postari'];
//$auxi['curier']+=23;
//$auxi['moderator']+=15;
//$auxi['administrator']+=31;
//$aux1['postari']+=5;
?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="mic"></canvas>

<script>
var uti = ["Utilizator", "Curier", "Moderator", "Administrator", "Postari"];
var val = [<?php echo $auxi['Utilizator'] . "," .  $auxi['curier'] . "," 
. $auxi['moderator'] . "," .
$auxi['administrator'] . "," . $aux1['postari'];
?>];
var col = ["red", "green","blue","orange","black"];

new Chart("mic", {
  type: "bar",
  data: {
    labels: uti,
    datasets: [{
      backgroundColor: col,
      data: val,
    }
    
]
},
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
  }
}
}
);
</script>

</body>
</html>


