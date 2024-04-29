INSERT INTO `TENANT` (`ID`, `NOME`) VALUES (1, 'FATTORIE ARGENTINE');



INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`, `TENANT_ID`) VALUES ('parmigiano', '22', '15', '7', '-1', '1');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`, `TENANT_ID`) VALUES ('pecorino', '22', '15', '7', '-1', '1');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`, `TENANT_ID`) VALUES ('gorgonzola', '22', '15', '7', '-1', '1');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`, `TENANT_ID`) VALUES ('ricotta', '22', '15', '7', '-1', '1');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`, `TENANT_ID`) VALUES ('mozzarella', '22', '15', '7', '-1', '1');
INSERT INTO `TIPO` (`NOME`, `UMIDITA_MAX`, `UMIDITA_MIN`, `TEMPERATURA_MAX`, `TEMPERATURA_MIN`, `TENANT_ID`) VALUES ('provolone', '22', '15', '7', '-1', '1');



INSERT INTO `SENSORE` (`NOME`) VALUES ('sensore 1');
INSERT INTO `TEMPERATURA` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '4', NULL, '1');
INSERT INTO `UMIDITA` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '33', NULL, '1');
INSERT INTO `TEMPERATURA` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '4', NULL, '1');
INSERT INTO `UMIDITA` (`ID`, `VALORE`, `TEMPO`, `SENSORE_ID`) VALUES (NULL, '33', NULL, '1');

INSERT INTO `UTENTE` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `TENANT_ID`) VALUES (NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'a@a.a', '1');
INSERT INTO `CASEIFICIO` (`ID`, `NOME`, `UTENTE_ID`) VALUES (NULL, 'prova', '1');
INSERT INTO `SCAFFALE` (`ID`, `NOME`, `CASEIFICIO_ID`) VALUES (NULL, 'prova', '1');


INSERT INTO `FORMAGGIO` (`ID`, `NOME`, `TEMPO`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES (NULL, 'prova', NULL, '1', '1', '1');
INSERT INTO `FORMAGGIO` (`ID`, `NOME`, `TEMPO`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES (NULL, 'prova2', NULL, '1', '2', '1');
INSERT INTO `FORMAGGIO` (`ID`, `NOME`, `TEMPO`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES (NULL, 'prova3', NULL, '1', '3', '1');