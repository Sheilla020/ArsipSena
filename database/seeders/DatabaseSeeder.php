<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ArsipSena;
use App\Models\Category;
use App\Models\Role;
use App\Models\UnitKerja;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { {
            UnitKerja::create([
                'unit' => 'SDM',
                'keterangan' => 'divisi sena'
            ]);
            UnitKerja::create([
                'unit' => 'Komersial',
                'keterangan' => 'divisi sena'
            ]);
            UnitKerja::create([
                'unit' => 'finance',
                'keterangan' => 'divisi sena'
            ]);
            UnitKerja::create([
                'unit' => 'Enginering',
                'keterangan' => 'divisi sena'
            ]);
            UnitKerja::create([
                'unit' => 'Proyek Asanti',
                'keterangan' => 'arsip proyek'
            ]);
            Category::create([
                'category' => 'proyek',
                'keterangan' => 'proyek komersial'
            ]);
            Category::create([
                'category' => 'personal',
                'keterangan' => 'personal proyek'
            ]);
            Category::create([
                'category' => 'CV',
                'keterangan' => 'template CV terbaru 2021'
            ]);
            Category::create([
                'category' => 'Invoice',
                'keterangan' => 'Invoice bulan des'
            ]);
            ArsipSena::create([
                'no_dokumen' => 'PR1234564',
                'nama_pengirim' => 'Sheilla Rizky',
                'perusahaan_pengirim' => 'Pt. Solusi Energy Nusantara',
                'prihal' => 'tes arsip',
                'keterangan' => 'coba upload file',
                'tgl_upload' => date(now()),
                'unit_kerja_id' => '1',
                'category_id' => '3',
            ]);
            ArsipSena::create([
                'no_dokumen' => 'IVC1234564',
                'nama_pengirim' => 'Bunga Kulsum',
                'perusahaan_pengirim' => 'Pt. Solusi Energy Nusantara',
                'prihal' => 'tes arsip pdf',
                'keterangan' => 'coba upload file',
                'tgl_upload' => date(now()),
                'unit_kerja_id' => '3',
                'category_id' => '3',
            ]);
            ArsipSena::create([
                'no_dokumen' => 'PRY1234564',
                'nama_pengirim' => 'Fikrulayli',
                'perusahaan_pengirim' => 'PGN',
                'prihal' => 'tes arsip proyek',
                'keterangan' => 'coba upload file',
                'tgl_upload' => date(now()),
                'unit_kerja_id' => '5',
                'category_id' => '2',
            ]);
            Role::create([
                'name' => 'admin'
            ]);
            Role::create([
                'name' => 'user'
            ]);
            User::create([
                'username' => 'Sheilla',
                'full_name' => 'Sheilla Rizky Saputri',
                'image' => 'profil.jpg',
                'level' => '1',
                'status' => 'active',
                'email' => 'sheilla@admin.com',
                'password' => bcrypt('admin123'),
                'unit_kerja_id' => '1',
            ]);
            User::create([
                'username' => 'Bunga',
                'full_name' => 'Bunga Kulsum',
                'image' => 'profil.jpg',
                'level' => '2',
                'status' => 'active',
                'email' => 'bunga@admin.com',
                'password' => bcrypt('admin123'),
                'unit_kerja_id' => '2',
            ]);
        }
    }
}
