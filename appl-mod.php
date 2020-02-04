<?php
include 'functions.php'; //Includo file con funzioni per query
var_dump($_POST);
if(!empty($_POST) && !empty($_POST['id_stanza']) && controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))) {
    $numero_stanza = intval($_POST['numero_stanza']); //Recupero dati numero stanza
    $piano = intval($_POST['piano']); //Recupero dati piano stanza
    $letti = intval($_POST['letti']); //Recupero dati letti stanza
    $id_stanza = intval($_POST['id_stanza']); //Recupero dati id

    $sql = "UPDATE stanze SET room_number = $numero_stanza, floor = $piano, beds = $letti, updated_at = NOW() WHERE id = $id_stanza"; //Query per modifica
    $result = esegui_query($sql);

    header('Location: '.'index.php?success=1'); //Ritorno alla pagina principale

} else {
    $result = false;
    header('Location: '.'index.php?success=0'); //Ritorno alla pagina principale
}
 ?>
