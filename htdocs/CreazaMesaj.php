<!DOCTYPE html>
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
    <form method="POST" action="PrelucreazaMesaj.php" id="formular">
        <div>
            <label>Mesaj:</label>
            <textarea id="descriere" class="large-form" required name="desc"></textarea>
        </div>
        <div>
            <label>Utilizator:</label>
            <input type="text" id="comanda" class="small-form" required name="val">
        </div>
        <label>Trimite</label>
        <input type="submit" id="input">
        </div>
    </form>
</body>

</html><!DOCTYPE html>
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
    <form method="POST" action="PrelucreazaMesaj.php" id="formular">
        <div>
            <label>Mesaj:</label>
            <textarea id="descriere" class="large-form" required name="desc"></textarea>
        </div>
        <div>
            <label>Utilizator:</label>
            <input type="text" id="comanda" class="small-form" required name="val">
        </div>
        <label>Trimite</label>
        <input type="submit" id="input">
        </div>
    </form>
</body>

</html>