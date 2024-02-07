<h1>Lista utenti da DB</h1>
<h3>Dati letti nel DB dal model</h3>
<ul>
<?php 
    foreach($data->query_data as $i) {
        echo '<li><a href="/userController/detail/' . $i->id . '">' . $i->username . '</a> - ' . $i->nickname . '</li>';
    }
?>
</ul>
<a href="/">Torna alla pagina di defaul</a>
