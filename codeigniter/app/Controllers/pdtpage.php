<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;

class pdtpage extends BaseController
{
    public function index()
    {
        return view('pdtpage');
    }
    // public function pdtpage(){
    //     $userModel = new UserModel();
    //     $productModel = new ProductModel();
    //     $userid=$this->request->getpost('userid');
    //     $userData = $userModel->where('id', $userid)->first();
    //     $categoryno=$this->request->getpost('categoryno');
    //     $productData = $productModel->where('categoryno', $categoryno)->findAll();


    //     $session = session();
    //     $session->set('isLoggedIn', true);
    //     // $userData=$this->request->getpost('userData');
    //     $session->set('userData', $userData);
    //     $session->set('productData', $productData);
    //     return redirect()->to('pdtpage')->with('userData',$userData,'productData',$productData);

    // }
}
