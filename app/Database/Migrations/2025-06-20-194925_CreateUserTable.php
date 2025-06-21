<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_user' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'bendahara', 'operator', 'guru'],
                'default'    => 'operator',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'default.png',
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

        $this->forge->addKey('id_user', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('user');

        // Insert default users + 10 guru
        $this->db->table('user')->insertBatch([
            [
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'nama_user'  => 'Administrator',
                'role'       => 'admin',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'bendahara',
                'password'   => password_hash('bendahara123', PASSWORD_DEFAULT),
                'nama_user'  => 'Bendahara Sekolah',
                'role'       => 'bendahara',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'operator',
                'password'   => password_hash('operator123', PASSWORD_DEFAULT),
                'nama_user'  => 'Operator SPP',
                'role'       => 'operator',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // 10 guru
            [
                'username'   => 'guru1',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Budi Santoso',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru2',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Dewi Lestari',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru3',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Agus Wirawan',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru4',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Siti Nurhaliza',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru5',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Rahmat Hidayat',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru6',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Nur Aini',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru7',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Dedi Mulyadi',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru8',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Sri Wahyuni',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru9',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Fajar Ramadhan',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru10',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama_user'  => 'Lina Marlina',
                'role'       => 'guru',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
