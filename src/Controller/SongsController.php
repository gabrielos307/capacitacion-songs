<?php

namespace App\Controller;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\Behavior\TreeBehavior;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class SongsController extends AppController
{

    public function index()
    {
        $songs = $this->Songs->find('all');
        $this->set(compact('songs'));

        $artists = $this->Songs->find()
        ->select(['artista_nombre'=>'Artists.nombre', 'Songs.id'])
        ->join([
            'table' => 'Artists',
            'type' => 'INNER',
            'conditions' => ['Songs.artista_id = Artists.id' ],
        ]);
        $this->set('artists', $artists);
    }
    public function view($id = null){
        $songs= $this->Songs->get($id);
        $this->set(compact('songs'));

        $artists = $this->Songs->find()
        ->select(['artista_nombre'=>'Artists.nombre', 'Songs.id'])
        ->join([
            'table' => 'Artists',
            'type' => 'INNER',
            'conditions' => ['Songs.artista_id = Artists.id','Songs.id' => $id ],
        ]);
        //->where(['id' => $id]);
        $query = $this->Songs->find()->select(['titulo'])->where(['id' => $id]);
        
        $this->set('artists', $artists);
        $this->set(compact('query'));
    }
    public function add(){
        $song = $this->Songs->newEntity();
        if($this->request->is('post')){
            $song = $this->Songs->patchEntity($song, $this->request->getData());
            $this->request->getData();
            print_r($this->request->getData());
            if($this->Songs->save($song)){
                $this->Flash->success(__('Se ha guardado la cancion'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo agregar la cancion'));
        }
        $this->set('song', $song);

        //$artists = $this->Songs->Artists->find('list', array('fields', array('nombre')));
        $this->set('artists', $this->Songs->Artists->find()->select(['id','nombre']));
    }
    public function edit($id = null){
        $song = $this->Songs->get($id);
        if($this->request->is(['post', 'put'])){
            $this->Songs->patchEntity($song, $this->request->getData());
            if($this->Songs->save($song)){
                $this->Flash->success(__('Tu cancion ha sido actualizada'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Tu cancion no se pudo actualizar'));
        }
        $this->set('song', $song);

        $artists = $this->Songs->Artists->find('list');
        $this->set(compact('artists'));
    }
    public function delete($id){
        $this->request->allowMethod(['post', 'delete']);
        $song = $this->Songs->get($id);
        if($this->Songs->delete($song)){
            $this->Flash->success(__('La canción con id: {0} ha sido eliminada', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}