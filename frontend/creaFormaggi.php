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
    <title>Creazione Formaggi</title>
</head>

<body>
    <a href="profile.php">Torna al profilo</a><br><br>

    <form action="creaFormaggiController.php" method="POST">
        <label for="tipo">Seleziona il tipo:</label>
        <select name="tipo" id="tipo">
            <option value=""> </option>
            <?php
            $result = $conn->query("SELECT nome,id FROM tipo ORDER BY nome");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select><br><br>
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
        <label for="scaffale">seleziona lo scaffale:</label>
        <select name="scaffale" id="scaffale">
            <option value=""></option>
        </select><br><br>
        <label for="nome">Identificativo:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <input type="submit" value="Submit">
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            var caseificio = document.getElementById("caseificio");
            caseificio.addEventListener("change", function (event) {
                var id = caseificio.value;
                var scaffale = document.getElementById("scaffale");
                var xhttp = new XMLHttpRequest();
                scaffale.innerHTML = '<option value=""></option>'
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        scaffale.innerHTML += this.responseText;
                    }
                };
                xhttp.open("GET", "apiScaffali.php?id=" + id, true);
                xhttp.send();
            });
        });

    </script>

</body>

</html>
<?php
$conn->close();
?>