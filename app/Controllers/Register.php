<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\HTTP\Request;

class Register extends BaseController
{
    public function index()
    {
        return view('v_register');
    }

    public function process()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => 'Minimal 4 Karakter',
                    'max_length' => 'Maximal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => 'Minimal 4 Karakter',
                    'max_length' => 'Maximal 50 Karakter'
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai!'
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => 'Minimal 4 Karakter',
                    'max_length' => 'Maximal 100 Karakter'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $users = new UsersModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name')
        ]);

        return redirect()->to('../login');
    }
}
