<?php
include 'layout/head.php'; //Richiamo head e header
?>

<main>
    <div id="main-sec" class="container">
        <div id="sec-title">
            <h2>Crea nuova stanza</h2>
            <div class="to-right clearfix">
                <a href="index.php" class="button info">Home</a>
            </div>
        </div>
        <div id="rooms-sec">
            <form method="POST" action="add.php">
              <div class="form-group">
                <label for="numero_stanza">Numero stanza</label>
                <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero stanza" required>
              </div>
              <div class="form-group">
                <label for="piano">Piano</label>
                <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano" required>
              </div>
              <div class="form-group">
                <label for="letti">Numero letti</label>
                <input name="letti" type="text" class="form-control" id="letti" placeholder="Letti" required>
              </div>
              <button class="button ok" type="submit" class="btn btn-success">Crea stanza</button>
            </form>
        </div>
    </div>
</main>
