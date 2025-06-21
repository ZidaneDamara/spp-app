<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'id_tagihan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_bayar' => [
                'type' => 'DATE',
            ],
            'jumlah_bayar' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'metode_bayar' => [
                'type'       => 'ENUM',
                'constraint' => ['tunai', 'transfer', 'e_wallet', 'kartu_kredit'],
                'default'    => 'tunai',
            ],
            'no_referensi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'comment'    => 'No rekening/e-wallet/kartu',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bukti_bayar' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'id_jurnal' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'created_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addKey(['tanggal_bayar']);
        $this->forge->addForeignKey('id_tagihan', 'tagihan_spp', 'id_tagihan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jurnal', 'jurnal', 'id_jurnal', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
