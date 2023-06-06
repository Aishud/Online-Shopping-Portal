<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class addpdt extends BaseController
{
    public function index()
    {
        return view('addpdt');
    }
    public function addpdt(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();

        $name=$this->request->getpost('name');
        $brand=$this->request->getpost('brand');
        $price=$this->request->getpost('price');
        $description=$this->request->getpost('description');
        $categoryno=$this->request->getpost('categoryno');
        $target_dir="images/";
        $target_file=$target_dir.basename($_FILES["image"]["name"]); 
        move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
        //$image=$this->request->getpost('image');
        $stock=$this->request->getpost('stock');
        $arr=['name'=>$name,'brand'=>$brand,'description'=>$description,'price'=>$price,'categoryno'=>$categoryno,'image'=>$target_file,'stock'=>$stock];
        
        
        $insert = $productModel->insert($arr);
        if($insert){
            $productData = $productModel->findAll(); 
            $categoryData = $categoryModel->findAll();
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userData', $userData);
            $session->set('productData', $productData);
            $session->set('categoryData', $categoryData);
            echo "<script>alert('Added Succesfully..!');window.history.go(-2);</script>";
            // return view('viewpdtsk');
        }
    }
}
