<?php


namespace App\Model\Table;

use Cake\Validation\Validator;

use Cake\ORM\Table;

class SongsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Artists')
            ->setForeignKey('id')
            ->setJoinType('INNER');
    }
    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('titulo')
            ->notEmpty('album')
            ->notEmpty('categoria');
        return $validator;
    }
}