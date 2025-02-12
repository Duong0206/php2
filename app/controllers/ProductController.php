<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends BaseController
{
    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = $this->product->getProduct();
        return $this->render('product.index', compact('products'));
    }

    public function addProduct()
    {
        return $this->render('product.add');
    }

    public function store()
    {
        if(isset($_POST['add'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors [] = "tên sản phẩm không được để trống";

            }
            if(empty($_POST['avatar'])){
                $errors [] = "ảnh đại diện không được để trống";
            }



            if(count($errors) > 0){
                
                flash('errors', $errors, 'add-product');
            }else{
                $result = $this->product->addProduct($_POST['name'], $_POST['avatar']);
                if($result){
                    flash('success', 'thêm thành công', 'list-product');
                }
            }
        }
    }
}