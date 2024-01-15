<?php
session_start();
if (isset($_SESSION["idUtente"])) {
    $id = $_SESSION["idUtente"];
}
$conn = new mysqli("localhost", "root", "", "formaggi");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creaione Formaggi</title>
</head>

<body>
    <a href="profile.php">Torna al profilo</a><br><br>

    <form action="creaFormaggiController.php" method="POST">
        <label for="tipo">Seleziona il tipo:</label>
        <select name="tipo" id="tipo">
            <?php
            $result = $conn->query("SELECT nome,id FROM tipo");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select><br><br>
        <label for="caseificio">Seleziona il caseificio:</label>
        <select name="caseificio" id="caseificio">
            <?php
            $result = $conn->query("SELECT nome,id FROM caseificio WHERE utente_id = $id");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select><br><br>
        <label for="scaffale">seleziona lo scaffale:</label>
        <select>
            <?php
            //do stuff
            
            ?>
        </select><br><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
<?php
$conn->close();
?>