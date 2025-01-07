<?php
//100% nu poate fi exploatat lucrul acesta. 
require_once '../db.php';
$name=$_POST['nume'];
$mail=$_POST['email'];
$aux=$conn->query("Select parola as p from utilizator where nume='$name' and email='$mail'");
if($conn->error)
header("Location: ../Init.php");
$aux=$aux->fetch_assoc();
$to      = $mail;
$subject = 'Parola';
$message = "Parola ta este: " . $aux['p'];
$headers = 'From: transport@gigel.com' . "\r\n" .
    'Reply-To: transport@gigel.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header("Location: ../Init.php");
?>
