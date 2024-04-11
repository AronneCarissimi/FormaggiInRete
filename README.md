# FormaggiInRete
problema:

    controllare la temperatura e l'umnidità e gestire i tempi di stagionatura dei formaggi in un piccolo caseificio


funzionalità:
    
    seguire lo stato i tutti i formaggi in stagionatura
    ricercare forme specifiche
    visualizzare un grafico dell'andamento di temparatura e umidità negli ultimi giorni
    inviare notifiche quando uno o più formaggi non si trovano alle condizioni ottimiali di stagionatura
    possibilità di registrare nuovi formaggi (e creare nuovi template?)

    
 ![ER](/ER%20formaggi.png)  


istruzioni:

- scaricare i file
- avviare apache e mySQL
- mettere i file nella cartella htdocs di xampp
- eseguire in ordine e query contenute nei file 'formaggiX.php':
      -0 x creae il databese
      -1 x creare le tabelle
      -2 per popolare le tabelle
- l'utente creato ha username admin e password admin


docker run --name myXampp -p 41061:22 -p 41062:80 -d -v /workspaces/FormaggiInRete:/www tomsik68/xampp:8