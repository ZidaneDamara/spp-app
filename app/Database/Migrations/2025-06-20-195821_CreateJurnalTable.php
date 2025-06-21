<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJurnalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jurnal' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_jurnal' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'referensi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'jenis' => [
                'type'       => 'ENUM',
                'constraint' => ['manual', 'otomatis'],
                'default'    => 'manual',
            ],
            'total_debit' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'total_kredit' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'posted', 'approved'],
                'default'    => 'draft',
            ],
            'created_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'approved_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'approved_at' => [
                'type' => 'DATETIME',
                'null' => true,
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

        $this->forge->addKey('id_jurnal', true);
        $this->forge->addKey('tanggal');
        $this->forge->addKey('status');

        $this->forge->addForeignKey('created_by', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'user', 'id_user', 'SET NULL', 'CASCADE');

        $this->forge->createTable('jurnal');
    }

    public function down()
    {
        $this->forge->dropTable('jurnal');
    }
}
