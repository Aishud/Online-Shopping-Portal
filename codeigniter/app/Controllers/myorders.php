<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\ProductModel;
use \App\Models\OrdersModel;
use \App\Models\CategoryModel;


class myorders extends BaseController
{
    public function index()
    {
        return view('myorders');
    }
    public function deletemyorder(){
        $userModel = new UserModel();
        $ordersModel = new OrdersModel();
        $userid=$this->request->getpost('userid');
        $userData = $userModel->where('id', $userid)->first();

        $orderid=$this->request->getpost('orderid');
        $result=$ordersModel->delete($orderid);
        if($result){
            echo "<script>alert('Deleted Succesfully..!');window.history.go(-1);</script>";
        }
        else{
            echo "Data Not Deleted";
        }  

    }
}
