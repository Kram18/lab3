<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->users = new \App\Models\UserModel();
    }
    public function index()
    {
        //
    }
    public function register()
    {
        

        $rules = [
            'username' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[userlogin.username]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];
        if($this->validate($rules))
        {
            $data = [
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'confirmpassword' => $this->request->getVar('confirmpassword'),
            ];
            $this->users->save($data);
            return redirect()->to('/signIn');
        }
        else 
        {
            $data['violation'] = $this->validator;
            echo view('register', $data);
        }
    }
    public function login()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->users->where('username', $username)->first();
        if($data)
        {
            $pass = $data['password'];
            $authenticatePassword = $password_verify($password, $pass);
            if($authenticatePassword)
            {
                $ses_data = 
                [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'isLoggedin' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('signIn');
            }
            else
            {   
                $session->setFlashdata('msg', 'password is incorrect.');
                return redirect()->to('signIn');
            }
           
        }
        else
        {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('signIn');
        }
    }
        public function signUp()
        {
            $data['users'] = $this->users->findAll();
            return view('register', $data);
        }

        public function singIn()
        {
            $data['users'] = $this->users->findAll();
            return view('login', $data);
        }
}