INSERT INTO `tipo` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('parmigiano', '22', '15', '7', '-1');
INSERT INTO `tipo` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('parmigianni', '67', '1', '18', '-273');
INSERT INTO `tipo` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('brie', '50', '30', '12', '5');
INSERT INTO `tipo` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('gorgonzola', '15', '7', '18', '-3');
INSERT INTO `tipo` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('pecorino', '33', '22', '22', '3');
INSERT INTO `tipo` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('caciocavallo', '50', '30', '18', '5');

INSERT INTO `SENSORE` (`NOME`) VALUES ('sensore 1');
INSERT INTO `temperatura` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '4', '2024-04-03', '1');
INSERT INTO `umidita` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '33', '2024-04-03', '1');
INSERT INTO `utente` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES (NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'a@a.a')