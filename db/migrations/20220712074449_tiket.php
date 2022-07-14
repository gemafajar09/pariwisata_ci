<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Tiket extends AbstractMigration
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
        $tiket = $this->table('tb_tiket', array('id' => 'id_tiket'));

        $tiket->addColumn('id_wisata', 'integer')
            ->addColumn('id_user', 'integer')
            ->addColumn('harga_tiket', 'integer')
            ->addColumn('jumlah', 'integer')
            ->addColumn('total', 'integer')
            ->addColumn('harga_parkir', 'integer')
            ->addColumn('keterangan', 'text')
            ->addColumn('dibuat', 'date')
            ->create();
    }
}
