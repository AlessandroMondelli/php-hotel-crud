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

function controlla_dati_stanza($numero_stanza, $piano, $letti) { //Funzione che controlla se i dati inseriti per la stanza sono validi
    if(
        !empty($numero_stanza) &&
        !empty($piano) &&
        !empty($letti) &&
        is_numeric($numero_stanza) &&
        is_numeric($piano) &&
        is_numeric($letti) &&
        intval($numero_stanza) > 0 &&
        intval($piano) > 0 &&
        intval($letti) > 0
    ) {
        return true;
    } else {
        return false;
    }
}

 ?>
