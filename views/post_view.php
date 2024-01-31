<h1>Lista posts da DB</h1>
<hr>
<h3>Dati letti nel DB dal model</h3>
<pre>
<?php 
    // print_r($data->query_data);
    foreach($data->query_data as $i) {
        echo '<h1>' . $i->titolo . '</h1>';
        echo '<h3>Autore: ' . $i->autore . '</h3>';
        echo '<p>' . $i->testo . '</p>';
    }
?>
</pre>
<a href="/">Back to Default Page</a>
