<?php
session_start();
if (isset($_SESSION["idUtente"])) {
    $id = $_SESSION["idUtente"];
}
$conn = new mysqli("localhost", "root", "", "FORMAGGI");
$conn = new mysqli("localhost", "root", "", "FORMAGGI");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creazione Formaggi</title>
</head>

<body>
    <a href="../profilo/profile.php">Torna al profilo</a><br><br>

    <form action="creaFormaggiController.php" method="POST">
        <label for="tipo">Seleziona il tipo:</label>
        <select name="tipo" id="tipo">
            <option value=""> </option>
            <?php
            $result = $conn->query("SELECT NOME,ID FROM TIPO ORDER BY NOME");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ID'] . "'>" . $row['NOME'] . "</option>";
            }
            ?>
        </select><br><br>
        <label for="caseificio">Seleziona il caseificio:</label>
        <select name="caseificio" id="caseificio">
            <option value=''> </option>
            <?php
            $result = $conn->query("SELECT NOME,ID FROM CASEIFICIO WHERE UTENTE_ID = $id ORDER BY nome");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ID'] . "'>" . $row['NOME'] . "</option>";
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
                        //scaffale.innerHTML += this.responseText;
                        var res = JSON.parse(this.responseText);
                        res.forEach(function (item) {
                            var option = document.createElement("option");
                            option.value = item[0];
                            option.text = item[1];
                            scaffale.appendChild(option);
                        });
                    }
                };
                xhttp.open("GET", "../api/apiScaffali.php?id=" + id, true);
                xhttp.send();
            });
        });

    </script>

</body>

</html>
<?php
$conn->close();
?>