<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Program;

class programs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'kode_program' => '00',
            'nama_program' => 'Program Pra-SD'
        ],
        [
            'kode_program' => '01',
            'nama_program' => 'Paket A'
        ],
        [
            'kode_program' => '02',
            'nama_program' => 'Paket B'
        ],
        [
            'kode_program' => '03',
            'nama_program' => 'Paket C'
        ],
        [
            'kode_program' => '04',
            'nama_program' => 'Rumah Tahfidz'
        ]);
    }
}
