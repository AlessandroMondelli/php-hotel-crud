<?php
include 'functions.php'; //Richiamo file con funzioni

$sql = "SELECT *
        FROM stanze
        JOIN prenotazioni ON prenotazioni.stanza_id = stanze.id
        JOIN pagamenti ON  prenotazioni.id = pagamenti.prenotazione_id
        JOIN paganti ON  pagamenti.pagante_id = paganti.id
        WHERE stanze.id = " . $_GET['id_stanza']; //Query per prendere dati stanza
$result = esegui_query($sql);

include 'layout/head.php';
?>
<main>
    <div id="main-sec" class="container">
        <div id="sec-title">
            <h2>Dettaglio Stanza</h2>
            <div class="to-right clearfix">
                <a class="button info" href="index.php">Home</a>
            </div>
        </div>
        <div id="rooms-sec">
            <?php
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc(); ?>
                <h3>Dettagli stanza <?php echo $row['id']; ?></h3>
                <ul>
                    <li>Numero stanza: <?php echo $row['room_number']; ?></li>
                    <li>Piano: <?php echo $row['floor']; ?></li>
                    <li>Numero letti: <?php echo $row['beds']; ?></li>
                    <li>Data creazione: <?php echo $row['created_at']; ?></li>
                    <li>Data ultima modifica: <?php echo $row['updated_at']; ?></li>
                </ul>
                <div class="prenotazione">
                    <p>Prenotazioni</p>
                <?php
                while ($row = $result->fetch_assoc()) { //Scorro risultati con funzione fetch assoc ?>
                    <ul>
                        <li>Nome pagante: <?php echo $row['name']; ?></li>
                        <li>Cognome pagante: <?php echo $row['lastname']; ?></li>
                        <li>Stato pagamento: <?php echo $row['status']; ?></li>
                        <li>Prezzo: <?php echo $row['price']; ?></li>
                    </ul>
                <?php
                }?>
                </div>
            <?php
            } elseif ($result) { ?>
                <p>Non ci sono risultati</p>
                <?php
            } else {
                ?>
                <p>Si è verificato un errore</p>
                <?php
            }
            ?>
        </div>
    </div>
</main>
