<h1><?= h($artists->nombre) ?></h1>
<p><?= h($artists->nacimiento) ?></p>
<?php if ($artists->es_banda === true):?>
    <p>Es banda</p>
<?php elseif($artists->es_banda === false):?>
    <p>Es solista</p>
<?php endif; ?>
<pre>
<?php
print_r($artists['Songs']);?>
</pre>