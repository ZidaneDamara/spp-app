<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTagihanSppTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tagihan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_siswa' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_tahun' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_jenis' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'tahun_tagihan' => [
                'type'       => 'YEAR',
                'constraint' => 4,
            ],
            'jumlah' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'denda' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'default'    => 0.00,
            ],
            'status_bayar' => [
                'type'       => 'ENUM',
                'constraint' => ['belum', 'sebagian', 'lunas'],
                'default'    => 'belum',
            ],
            'tanggal_jatuh_tempo' => [
                'type' => 'DATE',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
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

        $this->forge->addKey('id_tagihan', true);
        $this->forge->addUniqueKey(['id_siswa', 'id_tahun', 'id_jenis', 'bulan', 'tahun_tagihan']);
        $this->forge->addKey(['status_bayar']);
        $this->forge->addKey(['tanggal_jatuh_tempo']);
        $this->forge->addForeignKey('id_siswa', 'siswa', 'id_siswa', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tahun', 'tahun_ajaran', 'id_tahun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jenis', 'jenis_pembayaran', 'id_jenis', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'user', 'id_user', 'SET NULL', 'CASCADE');
        $this->forge->createTable('tagihan_spp');
    }

    public function down()
    {
        $this->forge->dropTable('tagihan_spp');
    }
}
