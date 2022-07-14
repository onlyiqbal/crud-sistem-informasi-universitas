<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matakuliah>
 */
class MatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $daftar_matakuliah = [
            "Matematika","Fisika Dasar","Kimia Dasar","Pengantar Rekayasa & Desain",
            "Pengenalan Teknologi Informasi","Bahasa Inggris","Olah Raga",
            "Pengantar Rekayasa & Desain","Tata Tulis Karya Ilmiah",
            "Pengantar Analisis Rangkaian","Dasar Pemrograman",
            "Algoritma & Struktur Data","Matematika Diskrit","Logika Informatika",
            "Probabilitas & Statistika", "Aljabar Geometri",
            "Organisasi & Arsitektur Komputer",
            "Pemrograman Berorientasi Objek","Strategi Algoritma",
            "Teori Bahasa Formal dan Otomata","Sistem Operasi","Basis Data",
            "Dasar Rekayasa Perangkat Lunak","Pengembangan Aplikasi Berbasis Web",
            "Pengembangan Aplikasi pada Platform Khusus","Jaringan Komputer",
            "Manajemen Proyek Perangkat Lunak","Manajemen Basis Data",
            "Interaksi Manusia & Komputer","Inteligensi Buatan","Agama dan Etika",
            "Sistem Paralel dan Terdistribusi","Sistem Informasi",
            "Proyek Perangkat Lunak","Grafika Komputer",
            "Socio-Informatika dan Profesionalisme",
            "Wawasan Teknologi & Komunikasi Ilmiah","Algoritma & Struktur Data",
            "Bahasa Inggris","Pengantar Sistem Operasi","Arsitektur SI/TI Perusahaan",
            "Kepemimpinan & Ketrampilan Interpersonal","Statistika",
            "Desain & Manajemen Proses Bisnis","Desain & Manajemen Jaringan Komputer",
            "Dasar-Dasar Pengembangan Perangkat Lunak","Pengantar Basis Data",
            "Pemrograman Berorientasi Objek","Analisis & Desain Perangkat Lunak",
            "Interaksi Manusia & Komputer","Keamanan Aset Informasi",
            "Desain Basis Data","Pemrograman Berbasis Web","Sistem Cerdas",
            "Konstruksi & Pengujian Perangkat Lunak","Tata Tulis Ilmiah",
            "Manajemen Proyek TI","Riset Operasi","Simulasi Sistem",
            "Manajemen Resiko TI", "Perencanaan Sumber Daya Perusahaan",
            "Manajemen Layanan TI","Tata Kelola TI"];
            $jurusan_id = $this->faker->numberBetween(1,Jurusan::count());
            $array_dosen = Dosen::where('jurusan_id',$jurusan_id)->get('id');
        return [
            'kode'=> strtoupper($this->faker->bothify('??###')),
            'nama' => $this->faker->randomElement($daftar_matakuliah),
            'jumlah_sks' => $this->faker->numberBetween(1,4),
            'jurusan_id' => $jurusan_id,
            'dosen_id' => $this->faker->randomElement($array_dosen)
        ];
    }
}
