<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengisian Data</title>
</head>

<body>
    <h3>Formulir Pengisian Data</h3>
    <form action="proses.php" method="POST">
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required>
        <br><br>

        <label for="nilai">Nilai:</label>
        <input type="text" id="nilai" name="nilai" required>
        <br><br>

        <label for="ulangi">Ulangi:</label>
        <input type="text" id="ulangi" name="ulangi" required>
        <br><br>

        <button type="submit" name="proses_data">SUBMIT</button>
    </form>
</body>

</html>