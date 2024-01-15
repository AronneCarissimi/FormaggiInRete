<?php
session_start();
if (isset($_SESSION["idUtente"])) {
    $id = $_SESSION["idUtente"];
}

$conn = new mysqli("localhost", "root", "", "formaggi");
// Add the missing import statement
$result = $conn->query("SELECT formaggio.NOME as NOME, formaggio.TEMPO, tipo.NOME as TIPO, scaffale.NOME as SCAFFALE, caseificio.NOME as CASEIFICIO FROM (((formaggio inner join scaffale on formaggio.SCAFFALE_ID=scaffale.ID) INNER JOIN caseificio on scaffale.CASEIFICIO_ID = caseificio.ID) INNER JOIN utente on caseificio.UTENTE_ID=utente.ID) INNER JOIN tipo on formaggio.TIPO_ID=tipo.ID WHERE utente.ID=$id;");
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
    <a href="profile.php">Torna al profilo</a><br><br>
    <table>
        <tr>
            <th>NOME</th>
            <th>TEMPO</th>
            <th>TIPO</th>
            <th>SCAFFALE</th>
            <th>CASEIFICIO</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
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
                    <?php echo $row['CASEIFICIO']; ?>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>

</html>

<?php
$conn->close();
?>