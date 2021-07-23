<h1>Añadir canción</h1>
<pre>

    <?php 
    foreach ($artists as $a){
    print_r($a->id);
    }?> 
</pre>
<?php
    echo $this->Form->create($song);
    echo $this->Form->input('titulo');
    echo $this->Form->input('album');
    echo $this->Form->input('categoria');
    foreach ($artists as $a){
        echo $this->Form->control('artists',
        [$a->id => $a->nombre]);
        //'select' => '<select name="{{}}"{{attrs}}>{{content}}</select>'
        //'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>'
    }
    
    
    
    
    //echo $this->Form->control('artista_id', ['options' => $artists]);
    
    echo $this->Form->button(__('Guardar cancion'));
    echo $this->Form->end();

?>