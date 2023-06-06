<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class editprofile extends BaseController
{
    public function index()
    {
        return view('editprofile');
    }
    public function editprofile()
    {
        $userModel = new UserModel();
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();

        $name=$this->request->getpost('name');
        $address=$this->request->getpost('address');
        $email=$this->request->getpost('email');
        $phnno=$this->request->getpost('phnno');
        $password=$this->request->getpost('password');
        $arr=['id'=>$userid,'name'=>$name,'phnno'=>$phnno,'email'=>$email,'address'=>$address,'password'=>$password];
        $result = $userModel->save($arr);

        if($result){
            if($userData['uid']==2){
                $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
            echo "<script>alert('Edited Succesfully..!');window.history.go(-2);</script>";
        }else{
            $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
            echo "<script>alert('Edited Succesfully..!');window.history.go(-2);</script>";
        }
    }
        else{
            echo "Data Not Found";
        }
    }
}
