<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class edituserprofile extends BaseController
{
    public function index()
    {
        return view('edituserprofile');
    }
    public function edituserprofile(){
        $userModel = new UserModel();
        $userid=$this->request->getpost('userid');
        $useridl=$this->request->getpost('useridl');
        $val=2;
        $name=$this->request->getpost('name');
        $address=$this->request->getpost('address');
        $email=$this->request->getpost('email');
        $phnno=$this->request->getpost('phnno');
        // $password=$this->request->getpost('password');
        $arr=['id'=>$useridl,'name'=>$name,'phnno'=>$phnno,'email'=>$email,'address'=>$address]; //,'password'=>$password];
        $result = $userModel->save($arr);
        $userDatal = $userModel->where('uid',$val)->findAll();
        $userData = $userModel->where('id', $userid)->first();

        if($result){
            
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userData', $userData);
            $session->set('userDatal', $userDatal);

            echo "<script>alert('Edited Succesfully..!');window.history.go(-2);</script>";
        
    }
        else{
            echo "Data Not Found";
        }
    } 
}