<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
session_destroy();
echo "Te ai delogat cu succes!";
?>