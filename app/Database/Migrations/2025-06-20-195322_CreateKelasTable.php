<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKelasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'tingkat' => [
                'type'       => 'ENUM',
                'constraint' => ['X', 'XI', 'XII'],
            ],
            'jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'id_wali_kelas' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default'    => 'aktif',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id_kelas', true);
        $this->forge->addUniqueKey('nama_kelas');

        // Foreign key wali_kelas ke user.id_user
        $this->forge->addForeignKey('id_wali_kelas', 'wali_kelas', 'id_walikelas', 'CASCADE', 'SET NULL');

        $this->forge->createTable('kelas');

        // Insert 10 data default
        $this->db->table('kelas')->insertBatch([
            [
                'nama_kelas'  => 'XII IPA 1',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 1,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 2',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 2,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 3',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 3,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 4',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 4,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 5',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 5,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 6',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 6,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 7',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 7,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 8',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 8,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 9',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 9,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kelas'  => 'XII IPA 10',
                'tingkat'     => 'XII',
                'jurusan'     => 'IPA',
                'id_wali_kelas'  => 10,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
