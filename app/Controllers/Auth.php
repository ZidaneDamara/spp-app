<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function proses()
    {
        $session = session();
        $model = new User();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek ke database
        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Simpan data ke session
                $sessionData = [
                    'id'       => $user['id'],
                    'email' => $user['email'],
                    'logged_in'=> true,
                ];
                $session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
