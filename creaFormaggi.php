<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="profile.php">Go back</a>

    <form action="creaFormaggiController.php" method="POST">
        <label for="tipo">Seleziona il tipo:</label>
        <select name="tipo" id="tipo">
            <?php

            $conn = new mysqli("localhost", "root", "", "formaggi");
            $result = $conn->query("SELECT nome FROM tipo");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
            }
            $conn->close();
            ?>
        </select><br><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>