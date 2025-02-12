<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = "players";
    //tạo ra thuộc tính table để gán bảng cho csdll

    //xây dựng hàm lấy danh sách sản phẩm

    public function getProduct()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);

        return $this->loadAllRows();
    }

    public function addProduct($name, $avatar)
    {
        $sql = "INSERT INTO $this->table(name, avatar) values(?, ?)";
        $this->setQuery($sql);
        return $this->execute([$name, $avatar]);
    }
}
