<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $songs = $this->table('songs');
        $songs->addColumn('titulo', 'string', ['limit' => 50])
            ->addColumn('album', 'string')
            ->addColumn('categoria','string', ['null' => true])
            ->addColumn('artista_id', 'integer', ['null' => true, 'default' => null])
            ->save();
        $artists = $this->table('artists');
        $artists->addColumn('nombre', 'string')
            ->addColumn('nacimiento', 'datetime', ['null'=> true, 'default' => null])
            ->addColumn('es_banda', 'boolean')
            ->save();
    }
}
