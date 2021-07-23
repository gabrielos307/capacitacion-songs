<?php
namespace App\Controller;


class ArtistsController extends AppController{
    public function index(){
        $artists = $this->Artists->find('all');
        $this->set(compact('artists'));
    }
    public function view($id = null){
        $artists = $this->Artists->get($id);
        $this->set('artists', $artists);
        $query = $artists->find()->contain(['Songs']);
        $this->set('songs', $songs);
    }
    public function add(){
        $artists  = $this->Artists->newEntity();
        if($this->request->is('post')){
            $artists = $this->Artists->patchEntity($artists, $this->request->getData());
            if($this->Artists->save($artists)){
                $this->Flash->success(__('Se ha guardado el artista'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo agregar el artista'));
        }
        $this->set('artists', $artists);
    }
    public function edit($id = null){
        $artists = $this->Artists->get($id);
        if($this->request->is(['post', 'put'])){
            $this->Artists->patchEntity($artists, $this->request->getData());
            if($this->Artists->save($artists)){
                $this->Flash->success(__('Se ha actualizado el artista'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Tu artista no se pudo actualizar'));
        }
        $this->set('artists', $artists);
    }
    public function delete($id)
    {
    $this->request->allowMethod(['post', 'delete']);

    $artists = $this->Artists->get($id);
    if ($this->Artists->delete($artists)) {
        $this->Flash->success(__('El artista: {0} ha sido eliminado.', h($artists->nombre)));
        return $this->redirect(['action' => 'index']);
    }
}

}