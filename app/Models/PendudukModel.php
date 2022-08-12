<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table = "penduduk";
    protected $primaryKey = "id_pend";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pend', 'NIK', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'no_telp', 'email', 'alamat'];
}
