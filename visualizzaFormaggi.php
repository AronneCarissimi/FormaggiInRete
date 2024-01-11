<?php
$result = $conn->query("SELECT formaggio.NOME, formaggio.TEMPO, tipo.NOME, scaffale.NOME, caseificio.NOME FROM (((formaggio inner join scaffale on formaggio.SCAFFALE_ID=scaffale.ID) INNER JOIN caseificio on scaffale.CASEIFICIO_ID = caseificio.ID) INNER JOIN utente on caseificio.UTENTE_ID=utente.ID) INNER JOIN tipo on formaggio.TIPO_ID=tipo.ID WHERE utente.ID=1;");
while ($row = $result->fetch_assoc()) {
    echo "$row";
}
$conn->close();
?>