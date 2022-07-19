<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Wisata extends AbstractMigration
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
        $wisata = $this->table('tb_wisata', array('id' => 'id_wisata'));

        $wisata->addColumn('id_user', 'integer')
            ->addColumn('nama_wisata', 'string', ['limit' => 255])
            ->addColumn('foto_wisata', 'text')
            ->addColumn('alamat', 'text')
            ->addColumn('pusat_informasi','text')
            ->addColumn('p3k','text')
            ->addColumn('mushola','text')
            ->addColumn('luas_mushola','text')
            ->addColumn('tempat_parkir','text')
            ->addColumn('luas_tempat_parkir','text')
            ->addColumn('wc','text')
            ->addColumn('jumlah_wc','integer')
            ->create();
    }
}
