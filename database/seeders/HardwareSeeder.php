<?php

namespace Database\Seeders;

use App\Models\Hardware;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HardwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_hardware' => 'Komputer'],
            ['nama_hardware' => 'Telephone'],
            ['nama_hardware' => 'Scanner'],
            ['nama_hardware' => 'Printer'],
            ['nama_hardware' => 'CCTV'],
        ];

        foreach ($data as $hardware) {
            Hardware::create([
                'nama_hardware' => $hardware['nama_hardware'],
            ]);
        }
    }
}
