<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kependudukan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pend' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'NIK' => [
                'type' => 'INT',
                'constraint' => '20'
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => "'pria','wanita'"
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id_pend');
        $this->forge->createTable('penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }
}
