<h1>Songs</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Album</th>
        <th>Categoria</th>
    </tr>

    
    <?php foreach ($songs as $song): ?>
    <tr>
        <td><?= $song->id ?></td>
        <td>
            <?= $this->Html->link($song->title,
            ['controller' => 'Songs', 'action' => 'view', $song->id]) ?>
        </td>
        <td><?= $song->titulo ?></td>
        <td><?= $song->album ?></td>
        <td><?= $song->Categoria ?></td>
    </tr>
    <?php endforeach; ?>
</table>