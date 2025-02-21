<?php

namespace App\Controllers;

use App\Models\Club;
use App\Models\Player;

class ClubController extends BaseController
{
    public $club;
    public $player;

    public function __construct()
    {
        $this->club = new Club();
        $this->player = new Player();
    }

    public function index()
    {
        $clubs = $this->club->getAllClubs();
        $nullPlayers = $this->player->getProductByClubNull();

        return $this->render('club.index', compact('clubs', 'nullPlayers'));
    }

    public function addClub()
    {
        return $this->render('club.add');
    }

    public function detail($id)
    {
        $club = $this->club->getClubDetail($id);
        $players = $this->player->getPlayerByClub($club->club_id);
        return $this->render('club.detail', compact('club', 'players')); 
    }

    public function edit($id)
    {
        $club = $this->club->getClubDetail($id);
        return $this->render('club.edit', compact('club')); 
    }

    public function store()
    {
        if (isset($_POST['add'])) {
            $club_name = $_POST['club_name'] ?? '';
            $club_id   = $_POST['club_id'] ?? '';

            $errors = [];
            if(empty($club_name)){
                $errors[] = "Tên câu lạc bộ không được để trống";
            }
            if(empty($club_id)){
                $errors[] = "Mã câu lạc bộ không được để trống";
            }

            if(count($errors) > 0){
                flash('errors', $errors, 'add-club/');
            } else {
                $result = $this->club->addClub($club_name, $club_id);
                if($result){
                    flash('success', 'Thêm Club thành công', 'club');
                } else {
                    flash('errors', 'Thêm Club thất bại, hãy thử lại', 'add-club/');
                }
            }
        }
    }

    public function update($id)
    {
        if (isset($_POST['update'])) {
            $club_name = $_POST['club_name'] ?? '';
            $club_id   = $_POST['club_id'] ?? '';

            $errors = [];
            if(empty($club_name)){
                $errors[] = "Tên câu lạc bộ không được để trống";
            }
            if(empty($club_id)){
                $errors[] = "Mã câu lạc bộ không được để trống";
            }

            if(count($errors) > 0){
                flash('errors', $errors, 'club.edit/' . $id);
            } else {
                $result = $this->club->updateClub($id, $club_name, $club_id);
                if($result){
                    flash('success', 'Cập nhật thành công', 'club');
                } else {
                    flash('errors', 'Cập nhật thất bại, hãy thử lại', 'club.edit/' . $id);
                }
            }
        }
    }

    public function destroy($id)
    {
        if (!isset($_SESSION['auth']) || $_SESSION['auth']['role'] != 1) {
            flash('errors', 'Bạn không có quyền xóa club', 'club');
            return;
        }

        $playerResult = $this->player->removeClubFromPlayers($id);

        $result = $this->club->deleteClub($id);
        if($result){
            flash('success', 'Xóa thành công', 'club');
        } else {
            flash('errors', 'Xóa thất bại, hãy thử lại', 'club');
        }
    }
}