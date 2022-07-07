<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Berita extends AbstractMigration
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
        $operator = $this->table('tb_berita', array('id' => 'id_berita'));

        $operator->addColumn('judul', 'string', ['limit' => 255])
            ->addColumn('isi_berita', 'text')
            ->addColumn('penulis', 'string', ['limit' => 255])
            ->addColumn('foto', 'string', ['limit' => 255])
            ->addColumn('tgl_publish', 'datetime')
            ->create();
    }
}
