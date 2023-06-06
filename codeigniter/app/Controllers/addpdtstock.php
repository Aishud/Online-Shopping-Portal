<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class addpdtstock extends BaseController
{
    public function index()
    {
        return view('addpdtstock');
    }
    public function addpdtstock(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
         $categoryModel = new CategoryModel();

        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();
        

        $pdtid=$this->request->getpost('pdtid');
        $stock=$this->request->getpost('stock');
        $arr=['id'=>$pdtid,'stock'=>$stock];
        $result = $productModel->save($arr);
        if($result){
            $productData = $productModel->findAll(); 
            // print_r($productData);
            $categoryData = $categoryModel->findAll();
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userData', $userData);
            $session->set('productData', $productData);
            $session->set('categoryData', $categoryData);
        
            echo "<script>alert('Edited Succesfully..!');window.history.go(-2);</script>";
            // return view('viewpdtsk');

        }

    }
}
