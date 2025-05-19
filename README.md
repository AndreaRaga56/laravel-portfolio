Parte 1
Descrizione
Nome repo: laravel-portfolio
Questo esercizio inizia oggi e lo continueremo fino alla fine del corso per creare passo dopo passo il nostro portfolio online!

Svolgimento
Per oggi, dedichiamoci alla creazione del nostro portfolio, mettendo su un'app Laravel provvista di autenticazione grazie a Breeze.
Avviamo l'installazione di Laravel
Installiamo Breeze e Bootstrap
Verifichiamo che l'autenticazione funzioni
Creiamo un layout per la nostra area admin
-----------------------------------------------------------

Parte 2
Descrizione
Nome repo: laravel-portfolio
Ora inseriamo la nostra prima entità: il Progetto.  

Svolgimento
L'obiettivo di oggi è quello di iniziare a preparare il back-office per poter gestire i progetti nel nostro sito portfolio
Creiamo il modello Project, con relativa migrazione ed un seeder per inserire inizialmente alcuni progetti nel Database
Prepariamo un Resource Controller (Admin/ProjectController) incaricato di gestire tutte le operazioni CRUD sui progetti. 
Soffermiamoci per oggi solo sulla logica delle azioni di index e show. 
Creiamo le rotte per i nostri progetti e prepariamo un layout per mostrare i nostri progetti in tabella nella rotta index. Inventiamo anche uno stile per la pagina di show, che dovrà mostrare un singolo progetto. 
-----------------------------------------------------------

Parte 3
Descrizione
Nome repo: laravel-portfolio
Oggi termineremo le operazioni CRUD sui progetti, dando la possibilità all'utente di creare nuovi progetti, modificare quelli esistenti o eliminarli.

Svolgimento
Procediamo al completamento delle operazioni CRUD sul modello Project:
- Prepariamo le rotte per le pagine di creazione e modifica dei progetti
- All'interno delle pagine, prepariamo i rispettivi form
- Nella pagina di dettaglio del progetto, mostriamo il Type a cui il progetto appartiene. Volendo, potremmo anche aggiungere una colonna che indica il tipo nella tabella della pagina Index dei progetti.
- Nel controller, inseriamo la logica per il salvataggio di un nuovo progetto, per la sua modifica e per l'eliminazione
- Nella tabella della pagina index, dovremo inserire i pulsanti su ciascuna riga, per permettere l'eliminazione e la modifica del singolo progetto. Inoltre, potremmo avere un singolo tasto in cima che ci porti alla pagina di creazione del progetto.

Bonus
Proviamo ad aggiungere un controllo: quando l'utente clicca sul pulsante "delete", chiediamo conferma della cancellazione, prima di eliminare l'elemento. Questa operazione possiamo farla a mano con JavaScript o aiutarci con i componenti Bootstrap.
