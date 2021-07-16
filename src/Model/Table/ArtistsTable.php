<?php


namespace App\Model\Table;
use Cake\Validation\Validator;

use Cake\ORM\Table;

class ArtitsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        // Just add the belongsTo relation with CategoriesTable
    }
}