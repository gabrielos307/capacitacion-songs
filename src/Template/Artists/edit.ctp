<h1>Editar artista</h1>
<?php
    echo $this->Form->create($artists);
    echo $this->Form->input('nombre');
    echo $this->Form->input('nacimiento');
    echo 'Es banda';
    echo $this->Form->checkbox('es_banda', ['value' => true]);
    echo $this->Form->button(__('Actualizar'));
    echo $this->Form->end();
?>