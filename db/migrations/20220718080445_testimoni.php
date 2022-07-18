<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Testimoni extends AbstractMigration
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
        $testimoni = $this->table('tb_testimoni', array('id' => 'id_testimoni'));

        $testimoni->addColumn('nama', 'string')
            ->addColumn('email', 'string')
            ->addColumn('komentar', 'text')
            ->addColumn('tanggal', 'date')
            ->addColumn('status', 'integer')
            ->create();
    }
}
