<?php

namespace App\Controllers;

use App\Models\Club;
use App\Models\Player;

class PlayerController extends BaseController
{
    public $player;
    public $club;

    public function __construct()
    {
        $this->player = new Player();
        $this->club = new Club();
    }

    public function index()
    {
        $players = $this->player->getAllPlayers();
        return $this->render('player.index', compact('players'));
    }

    public function addPlayer()
    {
        $clubs = $this->club->getAllClubs();
        return $this->render('player.add', compact('clubs'));

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

            if(empty($_POST['number_of_goal'])){
                $errors [] = "số bàn thắng không được để trống";
            }

            if(count($errors) > 0){
                
                flash('errors', $errors, 'add-player');
            }else{
                $result = $this->player->addPlayer($_POST['name'], $_POST['avatar'], $_POST['club_id'], $_POST['position'], $_POST['number_of_goal']);
                if($result){
                    flash('success', 'Thêm thành công', 'list-player');
                }
            }
        }
    }

    public function detail($id)
    {
        $player = $this->player->getPlayerDetail($id);
        $clubs = $this->club->getAllClubs();
        return $this->render('player.edit', compact('player', 'clubs'));
    }

    public function updatePlayer($id)
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

                flash('errors', $errors, 'detail-player/'.$id);
            }else{
                $result = $this->player->editPlayer($id, $_POST['name'], $_POST['avatar'], $_POST['club_id'], $_POST['position'], $_POST['number_of_goal']);
                if($result){
                    flash('success', 'Sửa thành công', 'list-player');
                }
            }
        }
    }

    public function destroy($id)
    {
        $result = $this->player->delete($id);

        if($result){
            flash('success', 'Xoá thành công', 'list-player');
        }else{
            flash('errors', 'Xoá thất bại', 'list-player');
        }
    }

    






}