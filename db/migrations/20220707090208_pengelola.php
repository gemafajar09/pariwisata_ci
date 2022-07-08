<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Pengelola extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $pengelola = $this->table('tb_pengelola', array('id' => 'id_pengelola'));

        $pengelola->addColumn('id_user', 'integer')
            ->addColumn('nama', 'string', ['limit' => 255])
            ->addColumn('alamat', 'text')
            ->addColumn('no_ktp','text')
            ->addColumn('foto','text')
            ->create();
    }
}
