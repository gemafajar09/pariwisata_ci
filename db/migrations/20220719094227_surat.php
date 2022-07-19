<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Surat extends AbstractMigration
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
        $surat = $this->table('tb_surat', array('id' => 'id_surat'));

        $surat->addColumn('surat', 'string')
            ->addColumn('id_user', 'integer')
            ->addColumn('id_wisata', 'integer')
            ->addColumn('tanggal', 'date')
            ->create();
    }
}
