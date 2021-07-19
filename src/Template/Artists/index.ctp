<h1>Artistas</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Nacimiento</th>
        <th>Es banda</th>
        <th>Acción</th>
    </tr>

    <?php foreach ($artists as $artist): ?>
        <tr>
            <td><?=$artist->id ?></td>
            <td>
                <?=$this->Html->link($artist->nombre,
                ['controller' => 'Artist', 'action' => 'view', $artist->id]) ?>
            </td>
            <td>
                <?=$artist->nacimiento?>
            </td>
            <td>
                <?php if ($artist->es_banda === true):?>
                    <p>Es banda</p>
                <?php elseif($artist->es_banda === false):?>
                   <p>Es solista</p>
                <?php endif; ?>
            </td>
            <td>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $artist->id],
                    ['confirm' => '¿Estás seguro?'])
                ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $artist->id]) ?>
            </td>
        
        </tr>
    <?php endforeach;?>
</table>