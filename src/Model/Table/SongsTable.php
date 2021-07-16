<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class SongsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        // Just add the belongsTo relation with CategoriesTable
        $this->belongsTo('Artists', [
            'foreignKey' => 'artista_id',
        ]);
    }
}