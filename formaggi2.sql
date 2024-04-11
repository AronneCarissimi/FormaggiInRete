INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('parmigiano', '22', '15', '7', '-1');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('parmigianni', '67', '1', '18', '-273');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('brie', '50', '30', '12', '5');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('gorgonzola', '15', '7', '18', '-3');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('pecorino', '33', '22', '22', '3');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`) VALUES ('caciocavallo', '50', '30', '18', '5');

INSERT INTO `SENSORE` (`NOME`) VALUES ('sensore 1');
INSERT INTO `TEMPERATURA` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '4', NULL, '1');
INSERT INTO `UMIDITA` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '33', NULL, '1');

INSERT INTO `UTENTE` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES (NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'a@a.a');
INSERT INTO `CASEIFICIO` (`ID`, `NOME`, `UTENTE_ID`) VALUES (NULL, 'prova', '1');
INSERT INTO `SCAFFALE` (`ID`, `NOME`, `CASEIFICIO_ID`) VALUES (NULL, 'prova', '1');

INSERT INTO `FORMAGGIO` (`ID`, `NOME`, `TEMPO`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES (NULL, 'prova', NULL, '1', '6', '1');
INSERT INTO `FORMAGGIO` (`ID`, `NOME`, `TEMPO`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES (NULL, 'prova2', NULL, '1', '2', '1');
INSERT INTO `FORMAGGIO` (`ID`, `NOME`, `TEMPO`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES (NULL, 'prova3', NULL, '1', '3', '1');