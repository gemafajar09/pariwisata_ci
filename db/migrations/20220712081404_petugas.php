<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Petugas extends AbstractMigration
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
        $petugas = $this->table('tb_petugas', array('id' => 'id_petugas'));

        $petugas->addColumn('nama', 'string')
            ->addColumn('nik', 'integer')
            ->addColumn('jabatan', 'integer')
            ->addColumn('foto', 'text')
            ->addColumn('alamat', 'text')
            ->addColumn('tgl_lahir', 'date')
            ->addColumn('ijazah', 'text')
            ->addColumn('jenis_kelamin', 'string')
            ->addColumn('no_hp', 'string')
            ->addColumn('kk', 'string')
            ->addColumn('agama', 'string')
            ->addColumn('pendidikan', 'string')
            ->addColumn('id_user', 'integer')
            ->addColumn('id_wisata', 'integer')
            ->addColumn('status', 'integer')
            ->create();
    }
}
