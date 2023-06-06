<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;

class editpdt extends BaseController
{
    public function index()
    {
        return view('editpdt');
    }
    public function editpdt()
    {
        $userModel = new UserModel();
        $productModel = new ProductModel();

        $userid=$this->request->getpost('userid');
        $pdtid=$this->request->getpost('pdtid');

        $userData = $userModel->where('id', $userid)->first();
        $productData = $productModel->findAll();

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
        $arr=['id'=>$pdtid,'name'=>$name,'brand'=>$brand,'decription'=>$description,'price'=>$price,'categoryno'=>$categoryno,'image'=>$target_file,'stock'=>$stock];
        
        $result = $productModel->save($arr);
        if($result){
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userData', $userData);
            $session->set('productData', $productData);
            return view('viewpdtsk');
        }
        else{
            echo "editing failed..";
        }
    }
}
