<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class adminprofile extends BaseController
{
    public function index()
    {
        return view('adminprofile');
    }
   
    public function adminprofile()
    {
        $userModel = new UserModel();
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
        return redirect()->to('editprofile')->with('userData', $userData);


    }
    
}
