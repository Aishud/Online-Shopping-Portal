<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;


class adminhome extends BaseController
{
    public function index()
    {
        return view('adminhome');
    }
    public function aprofile()
    {
        $userModel = new UserModel();
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
        return view('adminprofile');


    }
    public function adminhome(){
        $userModel = new UserModel();
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
        return redirect()->to('adminprofile')->with('userData', $userData);

    }
    public function viewpdts(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();


        // $productModel = new ProductModel();
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $categoryData=$categoryModel->findAll();
        $productData = $productModel->findAll();

        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
        $session->set('categoryData', $categoryData);
        $session->set('productData', $productData);
        return redirect()->to('viewpdtsl');

    }
    public function viewusers(){
        $userModel = new UserModel();
        $val=2;
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $userDatal = $userModel->where('uid', $val)->findAll();
        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userDatal', $userDatal);
        $session->set('userData', $userData);
        return redirect()->to('viewusers');

    }
    public function vieworders(){
        $userModel = new UserModel();
        $ordersModel = new OrdersModel();
        $productModel = new ProductModel();

        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        $userDatal = $userModel->findAll();
        $productData = $productModel->findAll();
        $ordersData=$ordersModel->findAll();
        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $userData);
        $session->set('userDatal', $userDatal);
        $session->set('ordersData',$ordersData);
        $session->set('productData',$productData);
        return redirect()->to('vieworders');

    }
}
