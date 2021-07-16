<?php

namespace App\Controller;

class SongsController extends AppController
{

    public function index()
    {
        $songs = $this->Songs->find('all');
        $this->set(compact('songs'));
    }
    public function view($id = null){
        $song = $this->Songs->get($id);
        $this->set(compact('song'));
    }
    public function add(){
        $song = $this->Songs->newEntity();
        if($this->request->is('post')){
            $song = $this->Songs->patchEntity($song, $this->request->getData());
            pr($this->request->getData());
            if($this->Songs->save($song)){
                $this->Flash->success(__('Se ha guardado la cancion'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo agregar la cancion'));
        }
        $this->set('song', $song);
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