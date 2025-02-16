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

    public function detail($id)
    {
        $product = $this->product->getDetail($id);
        return $this->render('product.edit', compact('product'));
    }

    public function updateProduct($id)
    {
        if(isset($_POST['update'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors [] = "tên sản phẩm không được để trống";

            }
            if(empty($_POST['avatar'])){
                $errors [] = "ảnh đại diện không được để trống";
            }



            if(count($errors) > 0){
                
                flash('errors', $errors, 'detail-product/'.$id);
            }else{
                $result = $this->product->editProduct($id, $_POST['name'], $_POST['avatar']);
                if($result){
                    flash('success', 'sửa thành công', 'list-product');
                }
            }
        }
    }

    public function destroy($id)
    {
        $result = $this->product->delete($id);

        if($result){
            flash('success', 'xoá thành công', 'list-product');
        }else{
            flash('errors', 'xoá thất bại', 'list-product');
        }
    }






}