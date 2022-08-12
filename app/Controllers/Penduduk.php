<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Penduduk extends BaseController
{
    protected $penduduk;

    function __construct()
    {
        $this->penduduk = new PendudukModel();
    }

    public function index()
    {
        $data['penduduk'] = $this->penduduk->findAll();
        return view('penduduk/index', $data);
    }

    public function about()
    {
        return view('v_about');
    }

    public function create()
    {
        return view('penduduk/create');
    }

    public function store()
    {
        if (!$this->validate([
            'NIK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'Email Harus Valid'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->penduduk->insert([
            'NIK' => $this->request->getVar('NIK'),
            'nama' => $this->request->getVar('nama'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('message', 'Tambah Data Penduduk Berhasil');
        return redirect()->to('/penduduk');
    }

    public function edit($id)
    {
        $dataPenduduk = $this->penduduk->find($id);
        if (empty($dataPenduduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Penduduk Tidak Ditemukan !');
        }
        $data['penduduk'] = $dataPenduduk;
        return view('penduduk/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'NIK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'Email Harus Valid'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->penduduk->update($id, [
            'NIK' => $this->request->getVar('NIK'),
            'nama' => $this->request->getVar('nama'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('message', 'Update Data Penduduk Berhasil');
        return redirect()->to('/penduduk');
    }

    function delete($id)
    {
        $dataPenduduk = $this->penduduk->find($id);
        if (empty($dataPenduduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Penduduk Tidak Ditemukan !');
        }
        $this->penduduk->delete($id);
        session()->setFlashdata('message', 'Delete Data Pegawai berhasil');
        return redirect()->to('/penduduk');
    }
}
