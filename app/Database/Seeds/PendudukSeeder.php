<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'NIK'           =>  '4151911',
                'nama'          =>  'Anton',
                'tanggal_lahir' =>  Time::now(),
                'jenis_kelamin' =>  'pria',
                'no_telp'       =>  '081234555678',
                'email'         =>  'anton@gmail.com',
                'alamat'    =>  'Jl. Mawar Putih No. 190, Waru Sidoarjo',
                'created_at' => Time::now()
            ],
            [
                'NIK'           =>  '4151912',
                'nama'          =>  'Budi',
                'tanggal_lahir' =>  Time::now(),
                'jenis_kelamin' =>  'pria',
                'no_telp'       =>  '08571234567',
                'email'         =>  'budi@gmail.com',
                'alamat'    =>  'Jl. Melati Putih No. 77, Gedangan Sidoarjo',
                'created_at' => Time::now()
            ],
            [
                'NIK'           =>  '4151913',
                'nama'          =>  'Dita',
                'tanggal_lahir' =>  Time::now(),
                'jenis_kelamin' =>  'wanita',
                'no_telp'       =>  '08122334455',
                'email'         =>  'dita@gmail.com',
                'alamat'    =>  'Jl. Rembulan No. 90, Krian Sidoarjo',
                'created_at' => Time::now()
            ]
        ];
        $this->db->table('penduduk')->insertBatch($data);
    }
}
