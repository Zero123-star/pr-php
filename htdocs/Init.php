<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/culoare.css">
</head>

<body>
<p>Insert random greetings text in here</p>

<p>Inregistreazate:</p>
    <div id="register">
        <form method="POST" action="inregistrat.php" id="formular">
            <label>Nume:</label>
            <input type="text" id="input" name="nume" required>
            <label>Parola:</label>
            <input type="password" id="input" name="pas1" required>
            <label>Email:</label>
            <input type="text" id="input" name="email">
            <label>Trimite</label>
            <input type="submit" id="input">
        </form>
    </div>
<p>Esti deja inregistrat?</p>
<buton onclick="document.getElementById('login').style.display='block'">Click</buton>
<div id="login" class="meniu">
        <form method="post" class="form" action="hello.php">
            <label>Nume:</label>
            <input type="text" id="input" name="nume">
            <label>Parola:</label>
            <input type="password"  id="input" name="pas1">
            <label>Trimite</label>
            <input type="submit" id="input">
        <buton id="cancel" onclick="document.getElementById('login').style.display='none'">Cancel</buton>
        </form>
</div>
</body>

</html>