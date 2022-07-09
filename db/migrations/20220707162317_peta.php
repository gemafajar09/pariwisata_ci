<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Peta extends AbstractMigration
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
        $peta = $this->table('tb_peta', array('id' => 'id_peta'));

        $peta->addColumn('lat', 'string')
            ->addColumn('lng', 'string')
            ->addColumn('id_wisata', 'integer')
            ->create();
    }
}