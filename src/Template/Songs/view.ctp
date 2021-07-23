
<h1>Título: <?=h($songs->titulo) ?></h1>
<p>Album: <?=h($songs->album) ?></p>
<p>Categoria: <?=h($songs->categoria) ?></p>
<p>Artista: <?php
foreach($artists as $q){
    echo $q->artista_nombre;
}?></p>




