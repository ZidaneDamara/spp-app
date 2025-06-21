<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisPembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'kode_jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'unique'     => true,
            ],
            'nominal' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'default'    => 0.00,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default'    => 'aktif',
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

        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('jenis_pembayaran');

        // Insert default jenis pembayaran
        $data = [
            [
                'nama_jenis' => 'SPP Bulanan',
                'kode_jenis' => 'SPP',
                'nominal' => 350000.00,
                'deskripsi' => 'Sumbangan Pembinaan Pendidikan bulanan',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_jenis' => 'Uang Gedung',
                'kode_jenis' => 'GEDUNG',
                'nominal' => 2500000.00,
                'deskripsi' => 'Uang pembangunan gedung sekolah',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_jenis' => 'Uang Seragam',
                'kode_jenis' => 'SERAGAM',
                'nominal' => 500000.00,
                'deskripsi' => 'Uang pembelian seragam sekolah',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_jenis' => 'Uang Buku',
                'kode_jenis' => 'BUKU',
                'nominal' => 750000.00,
                'deskripsi' => 'Uang pembelian buku pelajaran',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('jenis_pembayaran')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('jenis_pembayaran');
    }
}
