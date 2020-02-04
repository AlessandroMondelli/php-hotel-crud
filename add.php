<?php
include 'functions.php'; //Includo file con funzioni per query

if(!empty($_POST) && controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))) {
    $numero_stanza = intval($_POST['numero_stanza']); //Recupero dati numero stanza
    $piano = intval($_POST['piano']); //Recupero dati piano stanza
    $letti = intval($_POST['letti']); //Recupero dati letti stanza

    $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())"; //query per salvare nel db
    $result = esegui_query($sql);

    header('Location: '.'index.php?success=1'); //Ritorno alla pagina principale

} else {
    $result = false;
    header('Location: '.'index.php?success=0'); //Ritorno alla pagina principale
}
 ?>
