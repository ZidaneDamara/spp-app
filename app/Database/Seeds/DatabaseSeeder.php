<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call('UserSeeder');
        // $this->call('KelasSeeder');
        // $this->call('TahunAjaranSeeder');
        // $this->call('JenisPembayaranSeeder');
        // $this->call('AkunSeeder');
        // $this->call('PengaturanSeeder');
        $this->call('SiswaSeeder');
    }
}
