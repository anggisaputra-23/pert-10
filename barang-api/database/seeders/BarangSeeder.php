<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sqlPath = __DIR__ . '/data_barang_insert.sql';

        if (file_exists($sqlPath)) {
            $sql = file_get_contents($sqlPath);
            \DB::unprepared($sql);
            $this->command->info('Data barang berhasil diimport dari SQL file');
        } else {
            $this->command->error('File data_barang_insert.sql tidak ditemukan');
        }
    }
}
