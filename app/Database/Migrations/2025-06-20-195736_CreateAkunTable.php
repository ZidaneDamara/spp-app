<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkunTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'unique'     => true,
            ],
            'nama_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'id_jenis' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'debet' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => '0.00',
            ],
            'kredit' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => '0.00',
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
        
        $this->forge->addKey('id_akun', true);
        $this->forge->addForeignKey('id_jenis', 'jenis_akun', 'id_jenis', 'CASCADE', 'CASCADE');
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}