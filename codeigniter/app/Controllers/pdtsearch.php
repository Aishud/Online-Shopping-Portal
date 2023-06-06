<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;
use \App\Models\CartdataModel;

class pdtsearch extends BaseController
{
    public function index()
    {
        return view('pdtsearch');
    }
    // public function pdtsearch()
    // {
    //     $userModel = new UserModel();
    //     $productModel = new ProductModel();

    //     $userid=$this->request->getpost('userid');
    //     $userData = $userModel->where('id', $userid)->first();

    //     $search=$this->request->getpost('search');
    //     $productData = $productModel->where('name', $search)->first();

    //     $session = session();
    //     $session->set('productData', $productData);

    // }
    public function addtocart(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $cartdataModel = new CartdataModel();
        //$today = new DateTime('now'); 
        //$today = $today->format('Y-m-d');
        $userid=$this->request->getpost('userid');
        $pdtid=$this->request->getpost('pdtid');
        $today=$this->request->getpost('today');

        $userData = $userModel->where('id', $userid)->first();
        $productDatal = $productModel->where('id', $pdtid)->first();
        $categoryno = $productDatal['categoryno'];
        $productData = $productModel->where('categoryno', $categoryno)->findAll();
        $arr=['userid'=>$userid,'pdtid'=>$pdtid,'date'=>$today];
        $insert = $cartdataModel->insert($arr);
        if($insert){
            $session = session();
            $session->set('userData', $userData);
            $session->set('productData', $productData);
            $session->set('categoryno', $categoryno);
            echo "<script>alert('Added to cart..!');window.history.go(-1);</script>";
            // return redirect()->to('pdtpage')->with('userData',$userData,'productData',$productData);

            //  return view('pdtpagel')->with('userData',$userData);
        }
        $session->set('productData', $productData);
    }
    public function viewcart(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $cartdataModel = new CartdataModel();

        // $today = new DateTime('now'); 
        // $today = $today->format('Y-m-d');
        $userid=$this->request->getpost('userid');
        // $pdtid=$this->request->getpost('pdtid');
        $userData = $userModel->where('id', $userid)->first();
        // $sss=$cartdataModel->select('pdtid')->where('userid',$userid)->findAll();
        
        //print_r($ss);die;
        $productDatal = $cartdataModel->where('userid',$userid)->findAll();
        
        $productData = $productModel->findAll();
        $session = session();
        $session->set('userData', $userData);
        $session->set('productDatal', $productDatal);
        $session->set('productData', $productData);
        return redirect()->to('viewcartk');

    }
    public function buynow(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $ordersModel = new OrdersModel();
        $cartdataModel = new CartdataModel();
        // $today = new DateTime('now');
        // $today = $today->format('Y-m-d');
        $userid=$this->request->getpost('userid');
        $pdtid=$this->request->getpost('pdtid');
        $today=$this->request->getpost('today');
        $userData = $userModel->where('id', $userid)->first();
        $productDatak = $productModel->where('id', $pdtid)->first();
        $arr=['userid'=>$userid,'pdtid'=>$pdtid,'date'=>$today];
        $productDatal = $cartdataModel->where('userid',$userid)->findAll();

        $insert = $ordersModel->insert($arr);
        if($insert){        
        $data=$productDatak['stock'];
        $data-=1;
        $arr=['id'=>$pdtid,'stock'=>$data];
        $result = $productModel->save($arr);
        if($result){
            $productData =$productModel->findAll();

            $session = session();
        $session->set('userData', $userData);
        $session->set('productData', $productData);
        $session->set('productDatal', $productDatal);
            echo "<script>alert('Purchased Succesfully..!');window.history.go(-1);</script>";
        }
        else{
            echo "Data Not Found";
        }
        // return view('pdtsearch')->with('userData',$userData);
        }
    }
    public function deletecartitem() {

        $userModel = new UserModel();
        $productModel = new ProductModel();
        $cartdataModel = new CartdataModel();

        // $today = new DateTime('now'); 
        // $today = $today->format('Y-m-d');
        $userid=$this->request->getpost('userid');
        $pdtid=$this->request->getpost('pdtid');
        $cartid=$this->request->getpost('cartid');
        $userData = $userModel->where('id', $userid)->first();

        $productData = $productModel->findAll();

        $cartData = $cartdataModel->findAll();
        $result=$cartdataModel->delete($cartid);
        $productDatal = $cartdataModel->where('userid',$userid)->findAll();
        if($result){
            $session = session();
            $session->set('userData', $userData);
            $session->set('productDatal', $productDatal);
            $session->set('productData', $productData);
            echo "<script>alert('Removed Succesfully..!');window.history.go(-1);</script>";
        }
        else{
            echo "Data Not Deleted";
        }  
        //print_r($ss);die;
        
       
        // return redirect()->to('viewcartk');
    }
    public function buynowk(){
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $ordersModel = new OrdersModel();
        $cartdataModel = new CartdataModel();
        // $today = new DateTime('now');
        // $today = $today->format('Y-m-d');
        $userid=$this->request->getpost('userid');
        $pdtid=$this->request->getpost('pdtid');
        $today=$this->request->getpost('today');
        $cartid=$this->request->getpost('cartid');

        $userData = $userModel->where('id', $userid)->first();
        $productDatak = $productModel->where('id', $pdtid)->first();
        $arr=['userid'=>$userid,'pdtid'=>$pdtid,'date'=>$today];

        $insert = $ordersModel->insert($arr);
        if($insert){        
        $data=$productDatak['stock'];
        $data-=1;
        $arr=['id'=>$pdtid,'stock'=>$data];
        $result = $productModel->save($arr);
        if($result){
            $resultk=$cartdataModel->delete($cartid);
        $productDatal = $cartdataModel->where('userid',$userid)->findAll();

            $productData =$productModel->findAll();

            $session = session();
        $session->set('userData', $userData);
        $session->set('productData', $productData);
        $session->set('productDatal', $productDatal);
            echo "<script>alert('Purchased Succesfully..!');window.history.go(-1);</script>";
        }
        else{
            echo "Data Not Found";
        }
        // return view('pdtsearch')->with('userData',$userData);
    }
    }
}