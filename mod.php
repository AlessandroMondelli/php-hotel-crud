<?php
include 'functions.php'; //Richiamo file con funzioni

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id_stanza']; //Query per prendere dati stanza
$result = esegui_query($sql);

include 'layout/head.php';
?>

<main>
    <div id="main-sec" class="container">
        <div id="sec-title">
            <h2>Modifica stanza</h2>
            <div class="to-right clearfix">
                <a href="index.php" class="button info">Home</a>
            </div>
        </div>
        <div id="rooms-sec">
            <?php
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
             ?>
            <form method="POST" action="appl-mod.php">
              <input type="hidden" name="id_stanza" value="<?php echo $row['id']?>">
              <div class="form-group">
                <label for="numero_stanza">Numero stanza</label>
                <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" value="<?php echo $row['room_number']?>" required>
              </div>
              <div class="form-group">
                <label for="piano">Piano</label>
                <input name="piano" type="text" class="form-control" id="piano" value="<?php echo $row['floor']?>" required>
              </div>
              <div class="form-group">
                <label for="letti">Numero letti</label>
                <input name="letti" type="text" class="form-control" id="letti" value="<?php echo $row['beds']?>" required>
              </div>
              <button class="button ok" type="submit" class="btn btn-success">Modifica stanza</button>
            </form>
            <?php
            } elseif ($result) { //Se il risultato è vuoto ?>
                <p>Non ci sono risultati</p>
                <?php
            } else { //Se si verifica un errore nella query
                ?>
                <p>Si è verificato un errore</p>
                <?php
            }
            ?>
        </div>
    </div>
</main>
