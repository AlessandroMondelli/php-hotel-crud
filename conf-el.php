<?php
include 'functions.php'; //Includo file con funzioni per query
var_dump($_POST['id_stanza']);
if(!empty($_POST['id_stanza'])) {
    $id_stanza = intval($_POST['id_stanza']); //Recupero dati id

    $sql = "DELETE FROM stanze WHERE id = $id_stanza"; //query per salvare nel db
    $result = esegui_query($sql);

    header('Location: '.'index.php?success=1'); //Ritorno alla pagina principale

} else {
    $result = false;
    header('Location: '.'index.php?success=0'); //Ritorno alla pagina principale
}
 ?>
