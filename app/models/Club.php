<?php

namespace App\Models;

class Club extends BaseModel
{
    protected $table = "clubs";

    public function getAllClubs()
    {
        $sql = "SELECT * FROM $this->table ORDER BY updated_at DESC";
        $this->setQuery($sql);

        return $this->loadAllRows();
    }

    public function getClubDetail($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function addClub($club_name, $club_id)
    {
        $sql = "INSERT INTO $this->table(club_name, club_id) values(?, ?)";
        $this->setQuery($sql);
        return $this->execute([$club_name, $club_id]);
    }

    public function updateClub($id, $club_name, $club_id)
    {
        $sql = "UPDATE $this->table SET club_name = ?, club_id = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$club_name, $club_id, $id]);
    }

    public function deleteClub($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }



}