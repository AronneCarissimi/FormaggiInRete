<?php
session_start();
if (isset($_SESSION["idUtente"])) {
    $id = $_SESSION["idUtente"];
}
$conn = new mysqli("localhost", "root", "", "FORMAGGI");

$result = $conn->query("SELECT NOME,ID FROM CASEIFICIO WHERE UTENTE_ID = $id ORDER BY NOME");
// put the result in an array
$caseifici = [];
while ($row = $result->fetch_assoc()) {
    $caseifici[] = $row;
}
$result->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizzazione Formaggi</title>
    <style>
        table,
        th,
        td {
            border: 1px solid rgb(0, 0, 0);
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <a href="./profile.php">Torna al profilo</a><br>
    <a href="../creazione/creaFormaggi.php">crea formaggi</a><br><br>

    <?php
    foreach ($caseifici as $caseificio) {
        $id = $caseificio["ID"];
        $result = $conn->query("SELECT FORMAGGIO.ID as ID, FORMAGGIO.NOME as NOME, FORMAGGIO.TEMPO as TEMPO, TIPO.NOME as TIPO, SCAFFALE.NOME as SCAFFALE, CASEIFICIO.NOME as CASEIFICIO FROM (((FORMAGGIO inner join SCAFFALE on FORMAGGIO.SCAFFALE_ID=SCAFFALE.ID) INNER JOIN CASEIFICIO on SCAFFALE.CASEIFICIO_ID = CASEIFICIO.ID) INNER JOIN UTENTE on CASEIFICIO.UTENTE_ID=UTENTE.ID) INNER JOIN TIPO ON TIPO.ID = FORMAGGIO.TIPO_ID WHERE CASEIFICIO.ID=$id ORDER BY SCAFFALE,TIPO,NOME;");
        ?>
        <h2>
            <?php echo $caseificio["NOME"] ?>
        </h2>
        <table>
            <tr>
                <th>IDENTIFICATIVO</th>
                <th>TEMPO</th>
                <th>TIPO</th>
                <th>SCAFFALE</th>
                <th>ELIMINA</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>

                <tr id=<?php echo $row['ID'] ?>>
                    <td>
                        <?php echo $row['NOME']; ?>
                    </td>
                    <td>
                        <?php echo $row['TEMPO']; ?>
                    </td>
                    <td>
                        <?php echo $row['TIPO']; ?>
                    </td>
                    <td>
                        <?php echo $row['SCAFFALE']; ?>
                    </td>
                    <td>
                        <?php echo "<button onclick=\"eliminaRiga(" . $row['ID'] . ");\">elimina</button>" ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>

    <script>

        console.log(<?php echo json_encode($caseifici) ?>)

        function eliminaRiga(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../api/eliminaFormaggio.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                console.log(this.readyState)
                console.log(this.status + ": " + this.statusText)
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText)
                    let riga = document.getElementById(id)
                    riga.remove()
                }
            }
            xhr.send();
        }
    </script>
</body>

</html>
<?php
$conn->close();
?>