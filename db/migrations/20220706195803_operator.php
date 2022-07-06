<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Operator extends AbstractMigration
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
        $operator = $this->table('tb_operator', array('id' => 'id_operator'));

        $operator->addColumn('nama', 'string', ['limit' => 100])
            ->addColumn('nik', 'string', ['limit' => 16])
            ->addColumn('jabatan', 'string',['limit' => 50])
            ->addColumn('alamat','text')
            ->addColumn('foto','string',['limit' =>255])
            ->addColumn('id_user','integer')
            ->create();
    }
}
