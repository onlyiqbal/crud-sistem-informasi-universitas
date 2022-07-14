<?php

namespace Database\Seeders;

use App\Models\MahasiswaMatakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MahasiswaMatakuliah::factory()->count(200)->create();
    }
}
