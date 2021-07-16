<h1>Songs</h1>
<p><?= $this->Html->link('Añadir canción', ['controller' => 'Songs', 'action' => 'add'])?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Album</th>
        <th>Categoria</th>
        <th>Acción</th>
    </tr>

    
    <?php foreach ($songs as $song): ?>
    <tr>
        <td><?= $song->id ?></td>
        <td><?= $this->Html->link($song->titulo,
            ['controller' => 'Songs', 'action' => 'view', $song->id]) ?></td>
        <td><?= $song->album ?></td>
        <td><?= $song->categoria ?></td>

        <td>
            <?= $this->Form->postLink('Eliminar', 
            ['action' => 'delete', $song->id],
            ['confirm' => '¿Estás segur@?'])?>
            <?= $this->Html->link('Editar', ['controller' => 'Songs', 'action' => 'edit', $song->id])?></td>
    </tr>
    <?php endforeach; ?>
</table>