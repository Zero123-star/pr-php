<!DOCTYPE html>
<?php 
require_once 'boot.php';

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Forms</title>
    <style>
        .form-container {
            margin: 20px;
            padding: 10px;
        }

        .large-form {
            width: 800px;
            height: 300px;
        }

        .medium-form {
            width: 300px;
            height: 100px;
        }

        .small-form {
            width: 150px;
            height: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form method="POST" action="PrelucreazaPostare.php" id="formular">
        <div>
            <label>Descriere:</label>
            <textarea id="descriere" class="large-form" required name="desc"></textarea>
        </div>
        <div>
        <label>Captcha:</label>
        <img src="captcha.php">
        <input type="text" name="capt" required>
        </div>
        <div>
            <label>Adresa:</label>
            <textarea id="adresa" class="medium-form" required name="adresa"></textarea>
        </div>
        <div>
            <label>ValoareComanda:</label>
            <input type="number" id="comanda" class="small-form" required name="val">
        </div>
        <div>
            <label>Titlu:</label>
            <input type="text" id="titlu" class="small-form" required name="titlu">
        </div>
        <input type="hidden" name="cod" value="<?php echo $_SESSION['cod'] ?>">
        <div>
        <label>Trimite</label>
        <input type="submit" id="input">
        </div>
    </form>
</body>

</html>