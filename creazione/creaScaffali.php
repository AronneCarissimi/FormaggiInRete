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
    <title>Creazione Scaffali</title>
</head>

<body>
    <a href="../profilo/profile.php">Torna al profilo</a><br><br>

    <form action="creaScaffaliController.php" method="POST">

        <label for="caseificio">Seleziona il caseificio:</label>
        <select name="caseificio" id="caseificio">
            <option value=''> </option>
            <?php
            $result = $conn->query("SELECT nome,id FROM caseificio WHERE utente_id = $id ORDER BY nome");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
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