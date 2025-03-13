<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('m_supplier')->insert([
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'PT. Sumber Jaya', 'created_at' => NOW()],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'CV. Makmur Sentosa', 'created_at' => NOW()],
            ['supplier_kode' => 'SUP003', 'supplier_nama' => 'UD. Sukses Abadi',  'created_at' => NOW()],
        ]);
    }
}
