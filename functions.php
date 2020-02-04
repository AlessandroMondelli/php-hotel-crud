<?php
function connessione_db() { //Funzione per connettersi al db
    include 'db-conf.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function esegui_query($query) { //Funzione che esegue la query richiesta
    $conn = connessione_db(); //Richiamo funzione per connettermi al db

    if ($conn && $conn->connect_error) { //Verifico se la connessione porta ad un errore
        return NULL;
    } else { //Altrimenti ritorno un risultato
        $result = $conn->query($query);
        $conn->close(); //Chiudo connessione db
        return $result;
    }
}

 ?>
