<?php

namespace App\Controllers;

use App\Models\Account;

class AccountController extends BaseController
{
    protected $accountModel;

    public function __construct()
    {
        $this->accountModel = new Account();
    }

    public function showRegister()
    {
        return $this->render('account.register');
    }

    public function register()
    {
        if(isset($_POST['register'])){
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $re_password = $_POST['re_password'] ?? '';
            $email = $_POST['email'] ?? '';
            $name = $_POST['name'] ?? '';
    
            $errors = [];

            if(empty($username)){
                $errors[] = "Tên đăng nhập không được để trống";
            }

            if(empty($password)){
                $errors[] = "Mật khẩu không được để trống";
            }

            if(empty($re_password)){
                $errors[] = "Mật khẩu nhập lại không được để trống";
            }elseif($password !== $re_password){
                $errors[] = "Mật khẩu nhập lại không khớp";
            }

            if(empty($email)){
                $errors[] = "Email không được để trống";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Email không hợp lệ";
            }

            if(empty($name)){
                $errors[] = "Tên hiển thị không được để trống";
            }

            $existing = $this->accountModel->getAccountByUserName($username);
            if ($existing) {
                $errors[] = "Tên đăng nhập đã tồn tại, hãy chọn tên khác";
            }
    
            if(count($errors) > 0){
                $_SESSION['old'] = $_POST;
                flash('errors', $errors, 'register');
            }else{
                unset($_SESSION['old']);
                $result = $this->accountModel->register($username, $password, $email, $name);
                if($result){
                    flash('success', 'Đăng ký thành công, vui lòng đăng nhập', 'login');
                }else{
                    flash('errors', 'Đăng ký thất bại, hãy thử lại', 'register');
                }
            }
        }
    }

    public function showLogin()
    {
        return $this->render('account.login');
    }

    public function login()
    {
        $username = $_POST['username'] ?? '';
        $password  = $_POST['password'] ?? '';

        if(empty($username) || empty($password)){
            flash('errors', 'Vui lòng nhập đầy đủ thông tin', 'login');
        }

        $account = $this->accountModel->login($username, $password);
        if($account){
            $_SESSION['auth'] = [
                'username' => $account->username,
                'id' => $account->id,
                'role' => $account->role,
                'name' => $account->name
            ];
            flash('success', 'Đăng nhập thành công', 'list-player');
        }else{
            flash('errors', 'Tên đăng nhập hoặc mật khẩu không đúng', 'login');
        }
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        flash('success', 'Đăng xuất thành công. Bạn được điều hướng sang trang đăng nhập', 'login');
    }

}