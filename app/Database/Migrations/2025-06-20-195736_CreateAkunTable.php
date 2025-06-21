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
            'kode_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'unique'     => true,
            ],
            'nama_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tipe_akun' => [
                'type'       => 'ENUM',
                'constraint' => ['aktiva', 'kewajiban', 'modal', 'pendapatan', 'beban'],
            ],
            'kategori' => [
                'type'       => 'ENUM',
                'constraint' => ['lancar', 'tetap', 'jangka_panjang', 'operasional', 'non_operasional'],
                'null'       => true,
            ],
            'level' => [
                'type'       => 'TINYINT',
                'constraint' => 2,
                'default'    => 1,
            ],
            'parent_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'saldo_normal' => [
                'type'       => 'ENUM',
                'constraint' => ['debit', 'kredit'],
            ],
            'saldo_awal' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
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

        $this->forge->addKey('id_akun', true);
        $this->forge->addKey(['tipe_akun']);
        $this->forge->addForeignKey('parent_id', 'akun', 'id_akun', 'SET NULL', 'CASCADE');
        $this->forge->createTable('akun');

        // Insert chart of accounts
        $data = [
            // AKTIVA
            ['kode_akun' => '1000', 'nama_akun' => 'AKTIVA', 'tipe_akun' => 'aktiva', 'kategori' => 'lancar', 'level' => 1, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '1100', 'nama_akun' => 'AKTIVA LANCAR', 'tipe_akun' => 'aktiva', 'kategori' => 'lancar', 'level' => 2, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '1101', 'nama_akun' => 'Kas', 'tipe_akun' => 'aktiva', 'kategori' => 'lancar', 'level' => 3, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '1102', 'nama_akun' => 'Bank', 'tipe_akun' => 'aktiva', 'kategori' => 'lancar', 'level' => 3, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '1103', 'nama_akun' => 'Piutang SPP', 'tipe_akun' => 'aktiva', 'kategori' => 'lancar', 'level' => 3, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // KEWAJIBAN
            ['kode_akun' => '2000', 'nama_akun' => 'KEWAJIBAN', 'tipe_akun' => 'kewajiban', 'kategori' => 'jangka_panjang', 'level' => 1, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '2100', 'nama_akun' => 'KEWAJIBAN LANCAR', 'tipe_akun' => 'kewajiban', 'kategori' => 'lancar', 'level' => 2, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '2101', 'nama_akun' => 'Utang Usaha', 'tipe_akun' => 'kewajiban', 'kategori' => 'lancar', 'level' => 3, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // MODAL
            ['kode_akun' => '3000', 'nama_akun' => 'MODAL', 'tipe_akun' => 'modal', 'kategori' => 'operasional', 'level' => 1, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '3101', 'nama_akun' => 'Modal Sekolah', 'tipe_akun' => 'modal', 'kategori' => 'operasional', 'level' => 2, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // PENDAPATAN
            ['kode_akun' => '4000', 'nama_akun' => 'PENDAPATAN', 'tipe_akun' => 'pendapatan', 'kategori' => 'operasional', 'level' => 1, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '4100', 'nama_akun' => 'PENDAPATAN OPERASIONAL', 'tipe_akun' => 'pendapatan', 'kategori' => 'operasional', 'level' => 2, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '4101', 'nama_akun' => 'Pendapatan SPP', 'tipe_akun' => 'pendapatan', 'kategori' => 'operasional', 'level' => 3, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '4102', 'nama_akun' => 'Pendapatan Uang Gedung', 'tipe_akun' => 'pendapatan', 'kategori' => 'operasional', 'level' => 3, 'saldo_normal' => 'kredit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // BEBAN
            ['kode_akun' => '5000', 'nama_akun' => 'BEBAN', 'tipe_akun' => 'beban', 'kategori' => 'operasional', 'level' => 1, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '5100', 'nama_akun' => 'BEBAN OPERASIONAL', 'tipe_akun' => 'beban', 'kategori' => 'operasional', 'level' => 2, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '5101', 'nama_akun' => 'Beban Gaji Guru', 'tipe_akun' => 'beban', 'kategori' => 'operasional', 'level' => 3, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '5102', 'nama_akun' => 'Beban Listrik', 'tipe_akun' => 'beban', 'kategori' => 'operasional', 'level' => 3, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['kode_akun' => '5103', 'nama_akun' => 'Beban Air', 'tipe_akun' => 'beban', 'kategori' => 'operasional', 'level' => 3, 'saldo_normal' => 'debit', 'status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('akun')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}
