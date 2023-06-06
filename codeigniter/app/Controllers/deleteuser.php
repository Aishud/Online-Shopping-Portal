<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class deleteuser extends BaseController
{
    public function index()
    {
        return view('deleteuser');
    }
    public function deleteuser()
    {
        $userModel=new UserModel();
        $val=2;
        $useridl=$this->request->getpost('useridl');
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $result=$userModel->delete($useridl);
        if($result){
            $userDatal = $userModel->where('id', $val)->findAll();
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userData', $userData);
            $session->set('userDatal', $userDatal);
            echo "<script>alert('Deleted Succesfully..!');window.history.go(-2);</script>";
            // return redirect()->to('viewusers');

        }
        else{
            echo "Data Not Deleted";
        }  
    }
    public function canceldelete(){
        $userModel=new UserModel();
        $val=2;
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $userDatal = $userModel->where('id', $val)->findAll();
        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
        $session->set('userDatal', $userDatal);
        echo "<script>window.history.go(-2);</script>";

        // return redirect()->to('viewusers');

    }

}