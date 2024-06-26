DROP TABLE IF EXISTS FORMAGGIO;
DROP TABLE IF EXISTS UMIDITA;
DROP TABLE IF EXISTS TEMPERATURA;
DROP TABLE IF EXISTS TIPO;
DROP TABLE IF EXISTS SCAFFALE;
DROP TABLE IF EXISTS SENSORE;
DROP TABLE IF EXISTS CASEIFICIO;
DROP TABLE IF EXISTS UTENTE;

CREATE TABLE TENANT(
    ID INT UNSIGNED AUTO_INCREMENT,
    NOME VARCHAR(20) NOT NULL,
    CONSTRAINT PK_TENANT PRIMARY KEY (ID)
);






CREATE TABLE UTENTE(
    ID INT UNSIGNED AUTO_INCREMENT,
    USERNAME VARCHAR(20) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    EMAIL VARCHAR(63),
    TENANT_ID INT UNSIGNED,
    CONSTRAINT PK_UTENTI PRIMARY KEY (ID),
    CONSTRAINT UTENTE_FK_TENANT_ID FOREIGN KEY (TENANT_ID)
    REFERENCES TENANT(ID)

);

CREATE TABLE CASEIFICIO(
    ID INT UNSIGNED AUTO_INCREMENT,
    NOME VARCHAR(20) NOT NULL,
    UTENTE_ID INT UNSIGNED,
    CONSTRAINT PK_CASEIFICIO PRIMARY KEY (ID),
    CONSTRAINT CASEIFICIO_FK_UTENTE_ID FOREIGN KEY (UTENTE_ID)
    REFERENCES UTENTE(ID)
);


CREATE TABLE SCAFFALE( 
    ID INT UNSIGNED AUTO_INCREMENT, 
    NOME VARCHAR(20) NOT NULL, 
    CASEIFICIO_ID INT UNSIGNED,
    CONSTRAINT PK_SCAFFALE PRIMARY KEY (ID), 
    CONSTRAINT SCAFFALE_FK_CASEIFICIO_ID FOREIGN KEY (CASEIFICIO_ID)
    REFERENCES CASEIFICIO(ID)
);


CREATE TABLE TIPO(
    ID INT UNSIGNED AUTO_INCREMENT,
    NOME VARCHAR(20) NOT NULL,
    UMIDITA_MAX INT,
    UMIDITA_MIN INT,
    TEMPERATURA_MAX INT,
    TEMPERATURA_MIN INT,
    TENANT_ID INT UNSIGNED,
    CONSTRAINT PK_TIPO PRIMARY KEY (ID),
    CONSTRAINT TIPO_FK_TENANT_ID FOREIGN KEY (TENANT_ID)   
    REFERENCES TENANT(ID)

);


CREATE TABLE SENSORE(
    ID INT UNSIGNED AUTO_INCREMENT,
    NOME VARCHAR(20) NOT NULL,
    CASEIFICIO_ID INT UNSIGNED,
    CONSTRAINT PK_SENSORE PRIMARY KEY (ID),
    CONSTRAINT SENSORE_FK_CASEIFICIO_ID FOREIGN KEY (CASEIFICIO_ID)
    REFERENCES CASEIFICIO(ID)
);


CREATE TABLE UMIDITA(
    ID INT UNSIGNED AUTO_INCREMENT,
    VALORE FLOAT,
    TEMPO TIMESTAMP,
    SENSORE_ID INT UNSIGNED,
    CONSTRAINT PK_UMIDITA PRIMARY KEY (ID),
    CONSTRAINT UMIDITA_FK_SENSORE_ID FOREIGN KEY (SENSORE_ID)
    REFERENCES SENSORE(ID)
);


CREATE TABLE TEMPERATURA(
    ID INT UNSIGNED AUTO_INCREMENT,
    VALORE FLOAT,
    TEMPO TIMESTAMP,
    SENSORE_ID INT UNSIGNED,
    CONSTRAINT PK_TEMPERATURA PRIMARY KEY (ID),
    CONSTRAINT TEMPERATURA_FK_SENSORE_ID FOREIGN KEY (SENSORE_ID)
    REFERENCES SENSORE(ID)
);


CREATE TABLE FORMAGGIO( 
    ID INT UNSIGNED AUTO_INCREMENT, 
    NOME VARCHAR(20) NOT NULL,
    TEMPO TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    SCAFFALE_ID INT UNSIGNED,
    TIPO_ID INT UNSIGNED,
    SENSORE_ID INT UNSIGNED,
    CONSTRAINT PK_FORMAGGIO PRIMARY KEY (ID),
    CONSTRAINT FORAMGGIO_FK_SCAFFALE_ID FOREIGN KEY (SCAFFALE_ID)
    REFERENCES SCAFFALE(ID),
    CONSTRAINT FORMAGGIO_FK_TIPO_ID FOREIGN KEY(TIPO_ID)
    REFERENCES TIPO(ID),
    CONSTRAINT FORMAGGIO_FK_SENSORE_ID FOREIGN KEY (SENSORE_ID)
    REFERENCES SENSORE(ID)
);
