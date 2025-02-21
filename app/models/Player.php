<?php

namespace App\Models;

class Player extends BaseModel
{
    protected $table = "players";
    //tạo ra thuộc tính table để gán bảng cho csdll

    //xây dựng hàm lấy danh sách sản phẩm

    public function getAllPlayers()
    {
        $sql = "SELECT * FROM $this->table ORDER BY updated_at DESC";
        $this->setQuery($sql);

        return $this->loadAllRows();
    }

    public function getPlayerByClub($club_id)
    {
        $sql = "SELECT * FROM $this->table WHERE club_id = ? ORDER BY updated_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows([$club_id]);
    }

    public function addPlayer($name, $avatar, $club_id, $position, $number_of_goal)
    {
        $sql = "INSERT INTO $this->table(name, avatar, club_id, position, number_of_goal) values(?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$name, $avatar, $club_id, $position, $number_of_goal]);
    }

    public function getPlayerDetail($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editPlayer($id, $name, $avatar, $club_id, $position, $number_of_goal)
    {
        $sql = "UPDATE $this->table SET name = ?, avatar = ?, club_id = ?, position = ?, number_of_goal = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $avatar, $club_id, $position, $number_of_goal, $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function removeClubFromPlayers($club_id) {
        $sql = "UPDATE players SET club_id = NULL WHERE club_id = ?";
        $this->setQuery($sql);
        return  $this->execute([$club_id]);
    }

    public function getProductByClubNull(){
        $sql = "SELECT * FROM $this->table WHERE club_id IS NULL";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
