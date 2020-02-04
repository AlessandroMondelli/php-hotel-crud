<?php
include 'functions.php';
$sql = "SELECT id, room_number, floor FROM stanze"; //Stampo tutte le stanze del db
$result = esegui_query($sql); //Eseguo query

include 'layout/head.html';
include 'layout/header.html';
?>

<main>
    <div id="main-sec" class="container">
        <div id="sec-title">
            <h2>Stanze Hotel</h2>
            <div class="to-right clearfix">
                <button class="button ok" type="button">Crea una nuova stanza</button>
            </div>
        </div>
        <div id="rooms-sec">
            <table>
                <thead>
                    <tr>
                        <th>Room number</th>
                        <th>Floor</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) { //Se ho risultati dalla query..
                        while ($row = $result->fetch_assoc()) { //Scorro risultati con funzione fetch assoc ?>
                            <tr>
                                <td><?php echo $row['room_number']; ?></td>
                                <td><?php echo $row['floor']; ?></td>
                                <td>
                                    <a class="button info" href="details.php?id_stanza=<?php echo $row['id']; ?>">
                                        Visualizza
                                    </a>
                                    <a class="button mod" href="">
                                        Modifica
                                    </a>
                                    <a class="button el" href="">
                                        Cancella
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } elseif ($result) { //Se il risultato è vuoto ?>
                        <tr>
                            <td colspan="3">Non ci sono risultati</td>
                        </tr>
                        <?php
                    } else { //Se si verifica un errore nella query
                        ?>
                        <tr>
                            <td colspan="3">Si è verificato un errore</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
        </div>
    </div>
</main>
