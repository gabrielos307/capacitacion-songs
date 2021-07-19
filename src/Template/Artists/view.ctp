<h1><?= h($artist->nombre) ?></h1>
<p><?= h($article->nacimiento) ?></p>
<?php if ($artist->es_banda === true):?>
    <p>Es banda</p>
<?php elseif($artist->es_banda === false):?>
    <p>Es solista</p>
<?php endif; ?>