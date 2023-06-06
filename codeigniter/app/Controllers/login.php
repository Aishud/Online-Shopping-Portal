<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function login()
    {
        $userModel = new UserModel();

        $email=$this->request->getpost('email');
        $password=$this->request->getpost('password');
        $arr=['email'=>$email,'password'=>$password];
        
        $userData = $userModel->where('email', $email)->first();
        

        // $resultl = $userModel->where('password', $password)->first();
        if ($password == $userData['password']) {
            if($userData['uid'] == 2){
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $userData);
                return redirect()->to('userhome');
            }
            else{
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $userData);
                return redirect()->to('adminhome');

            }
        } else {
            $session = session();
            $session->setFlashdata('error', 'Incorrect password');
            return redirect()->to('login');
        }
        
        // if($password==$userData['password']){
        //     return redirect()->to('userprofile');
        // }else{
        //     $session = session();
        //     $session->setFlashdata('error', 'Incorrect password');
        //     return redirect()->to('login');
        //     // echo '<script>alert("Password do not match!");</script>';
        //         }

        // var_dump($userData);die;
    }
}
