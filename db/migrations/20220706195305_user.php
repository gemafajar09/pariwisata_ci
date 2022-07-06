<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class User extends AbstractMigration
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
        $users = $this->table('tb_user', array('id' => 'id_user'));

        $users->addColumn('username', 'string', ['limit' => 255])
            ->addColumn('password_hash', 'string', ['limit' => 255])
            ->addColumn('status', 'integer',['default' => '0'])
            ->addColumn('level','integer')
            ->create();
    }
}
