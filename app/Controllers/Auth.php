<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Events\Events;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function saveRegister()
    {
        $rules = [

            'name' => 'required',

            'email' => 'required|valid_email|is_unique[users.email]',

            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {

            return $this->response->setJSON([
                'status' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }

        $userModel = new UserModel();

        $userModel->save([

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ]);

        return $this->response->setJSON([
            'status' => true
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function loginCheck()
    {
        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('email', $email)
            ->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([

                'id' => $user['id'],

                'name' => $user['name'],

                'isLoggedIn' => true
            ]);

            // EVENT
            Events::trigger('userLoggedIn', $user['id']);

            return $this->response->setJSON([
                'status' => true
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid Login'
        ]);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}