<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTahunAjaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahun' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 9,
                'comment'    => 'Format: 2023/2024',
            ],
            'semester' => [
                'type'       => 'ENUM',
                'constraint' => ['Ganjil', 'Genap'],
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default'    => 'nonaktif',
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
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

        $this->forge->addKey('id_tahun', true);
        $this->forge->addUniqueKey(['tahun', 'semester']);
        $this->forge->createTable('tahun_ajaran');

        // Insert default tahun ajaran
        $data = [
            [
                'tahun' => '2024/2025',
                'semester' => 'Ganjil',
                'status' => 'aktif',
                'tanggal_mulai' => '2024-07-15',
                'tanggal_selesai' => '2024-12-20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tahun' => '2024/2025',
                'semester' => 'Genap',
                'status' => 'nonaktif',
                'tanggal_mulai' => '2025-01-06',
                'tanggal_selesai' => '2025-06-15',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('tahun_ajaran')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('tahun_ajaran');
    }
}
