<?php

namespace App\Models;

class Account extends BaseModel
{
    protected $table = 'account';


    public function getAccountByUserName($username)
    {
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $this->setQuery($sql);
        return $this->loadRow([$username]);
    }

    public function register($username, $password, $email, $name)
    {
        $role = '2';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO $this->table(username, password, email, name, role) values(?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$username, $hashedPassword, $email, $name, $role]);
    }

    public function login($username, $password)
    {
        $account = $this->getAccountByUserName($username);
        if ($account && password_verify($password, $account->password)) {
            return $account;
        }
        return false;
    }




}