<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaturanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'key_setting' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
            'value_setting' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'tipe' => [
                'type'       => 'ENUM',
                'constraint' => ['text', 'number', 'boolean', 'json'],
                'default'    => 'text',
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

        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaturan');

        // Insert default settings
        $data = [
            [
                'key_setting' => 'nama_sekolah',
                'value_setting' => 'SMA Negeri 1 Jakarta',
                'deskripsi' => 'Nama sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'alamat_sekolah',
                'value_setting' => 'Jl. Pendidikan No. 123, Jakarta',
                'deskripsi' => 'Alamat sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'telepon_sekolah',
                'value_setting' => '021-12345678',
                'deskripsi' => 'Nomor telepon sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'email_sekolah',
                'value_setting' => 'info@sman1jakarta.sch.id',
                'deskripsi' => 'Email sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'kepala_sekolah',
                'value_setting' => 'Dr. Ahmad Suryadi, M.Pd',
                'deskripsi' => 'Nama kepala sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'nip_kepala_sekolah',
                'value_setting' => '196501011990031001',
                'deskripsi' => 'NIP kepala sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'logo_sekolah',
                'value_setting' => 'logo-sekolah.png',
                'deskripsi' => 'File logo sekolah',
                'tipe' => 'text',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'denda_per_hari',
                'value_setting' => '5000',
                'deskripsi' => 'Denda keterlambatan per hari',
                'tipe' => 'number',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'batas_hari_denda',
                'value_setting' => '30',
                'deskripsi' => 'Batas hari mulai denda',
                'tipe' => 'number',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_setting' => 'auto_generate_tagihan',
                'value_setting' => 'true',
                'deskripsi' => 'Otomatis generate tagihan bulanan',
                'tipe' => 'boolean',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pengaturan')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('pengaturan');
    }
}
