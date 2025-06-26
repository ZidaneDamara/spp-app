<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWaliKelasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_walikelas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_user' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nip' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'default.png',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['honorer', 'pns'],
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_walikelas', true);
        $this->forge->addUniqueKey('nip');
        $this->forge->createTable('wali_kelas');

        $this->db->table('wali_kelas')->insertBatch([
            [
                'nama_user' => 'Budi Santoso',
                'nip' => 10001,
                'foto' => 'default.png',
                'status' => 'pns',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Dewi Lestari',
                'nip' => 10002,
                'foto' => 'default.png',
                'status' => 'honorer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Agus Wirawan',
                'nip' => 10003,
                'foto' => 'default.png',
                'status' => 'pns',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Siti Nurhaliza',
                'nip' => 10004,
                'foto' => 'default.png',
                'status' => 'honorer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Rahmat Hidayat',
                'nip' => 10005,
                'foto' => 'default.png',
                'status' => 'pns',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Nur Aini',
                'nip' => 10006,
                'foto' => 'default.png',
                'status' => 'honorer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Dedi Mulyadi',
                'nip' => 10007,
                'foto' => 'default.png',
                'status' => 'pns',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Sri Wahyuni',
                'nip' => 10008,
                'foto' => 'default.png',
                'status' => 'honorer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Fajar Ramadhan',
                'nip' => 10009,
                'foto' => 'default.png',
                'status' => 'pns',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_user' => 'Lina Marlina',
                'nip' => 10010,
                'foto' => 'default.png',
                'status' => 'honorer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }

    public function down()
    {
                $this->forge->dropTable('wali_kelas');
    }
}
