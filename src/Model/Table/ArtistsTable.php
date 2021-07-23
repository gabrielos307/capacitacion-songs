<?php


namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Behavior\TreeBehavior;
use Cake\ORM\Table;

class ArtistsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        //$this->addBehavior('Tree');
        $this->hasMany('Songs')
            ->setForeignKey('artista_id');
    }
    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('nombre')
            ->notEmpty('nacimiento')
            ->notEmpty('es_banda');
        return $validator;
    }
}