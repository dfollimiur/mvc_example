<h1>Dettaglio del postLista posts da DB</h1>
<hr>
<h3>Dati del post letti nel DB dal model</h3>
<pre>
<?php 
    // print_r($data->query_data);
    echo '<h1>' . $data->query_data->titolo . '</h1>';
    echo '<h3>Autore: ' . $data->query_data->autore . '</h3>';
    echo '<p>' . $data->query_data->testo . '</p>';

?>
</pre>
<a href="/postController/list/">Torna alla lista di post</a>
