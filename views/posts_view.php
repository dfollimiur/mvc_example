<h1>Lista posts da DB</h1>
<h3>Dati letti nel DB dal model</h3>
<hr>
<?php 
    // print_r($data->query_data);
    foreach($data->query_data as $i) {
        echo '<h2>' . $i->titolo . '</h2>';
        echo '<h4>Autore: ' . $i->autore . '</h4>';
        echo '<p>' . $i->testo . '... <a href="/postController/detail/' . $i->id . '">Leggi il post</a></p>';
    }
?>
<hr>
<a href="/">Torna alla pagina di defaul</a>
