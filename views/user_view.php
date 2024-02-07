<h1>Dettaglio utente</h1>
<hr>
<h3>Dati dell'utente letti nel DB dal model</h3>
<pre>
<?php 
    echo '<h1>' . $data->query_data->username . '</h1>';
    echo '<h3>Nickname: ' . $data->query_data->nickname . '</h3>';
?>
</pre>
<a href="/userController/list/">Torna alla lista di post</a>
