<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_departemen' => 'Mawar'],
            ['nama_departemen' => 'Tulip'],
            ['nama_departemen' => 'Anggrek'],
            ['nama_departemen' => 'Lily'],
            ['nama_departemen' => 'ICU Camelia'],
            ['nama_departemen' => 'ICU Alamanda'],
            ['nama_departemen' => 'Casemix'],
            ['nama_departemen' => 'Poli Mata'],
            ['nama_departemen' => 'Poli THT'],
            ['nama_departemen' => 'Poli Anak'],
            ['nama_departemen' => 'Poli Obsgyn'],
            ['nama_departemen' => 'Poli Interna HD'],
            ['nama_departemen' => 'Poli Paru'],
            ['nama_departemen' => 'Poli Bedah'],
            ['nama_departemen' => 'Poli Umum'],
            ['nama_departemen' => 'Poli Psikiatri'],
            ['nama_departemen' => 'Poli Orthopedi'],
            ['nama_departemen' => 'Melati'],
            ['nama_departemen' => 'Sakura'],
            ['nama_departemen' => 'Teratai'],
            ['nama_departemen' => 'Asoka'],
            ['nama_departemen' => 'Dahlia'],
            ['nama_departemen' => 'VK'],
            ['nama_departemen' => 'Admin'],
            ['nama_departemen' => 'Umun dan RT'],
            ['nama_departemen' => 'IPS'],
            ['nama_departemen' => 'IT'],
            ['nama_departemen' => 'Pendaftaran'],
            ['nama_departemen' => 'PIPP'],
            ['nama_departemen' => 'Keuangan'],
            ['nama_departemen' => 'Rekam Medis'],
            ['nama_departemen' => 'HRD'],
            ['nama_departemen' => 'Keamanan'],
        ];

        foreach ($data as $value) {
            Departemen::create([
                'nama_departemen' => $value['nama_departemen'],
            ]);
        }
    }
}
