<h1>Añadir canción</h1>
<?php
    echo $this->Form->create($song);
    echo $this->Form->input('titulo');
    echo $this->Form->input('album');
    echo $this->Form->input('categoria');
    echo $this->Form->input('artists');
    echo $this->Form->button(__('Guardar cancion'));
    echo $this->Form->end();

?>