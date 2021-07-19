<h1>Añadir artista</h1>
<?php
    echo $this->Form->create($artists);
    echo $this->Form->input('nombre');
    echo $this->Form->input('nacimiento');
    echo 'Es banda';
    echo $this->Form->checkbox('es_banda', ['value' => true]);
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>