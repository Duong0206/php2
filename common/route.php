<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

$router->get('/', function(){
    return "trang chủ";
});

$router->get('register', [\App\Controllers\AccountController::class, 'showRegister']);
$router->post('register', [\App\Controllers\AccountController::class, 'register']);
$router->get('login', [\App\Controllers\AccountController::class, 'showLogin']);
$router->post('login', [\App\Controllers\AccountController::class, 'login']);
$router->get('logout', [\App\Controllers\AccountController::class, 'logout']);

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

// khu vực cần quan tâm -----------
// bắt đầu định nghĩa ra các đường dẫn
$router->group(['before' => 'auth'], function($router){
    
    //định nghĩa đường dẫn trỏ đến Player Controller
    $router->get('list-player',[\App\Controllers\PlayerController::class,'index']);
    $router->get('add-player',[\App\Controllers\PlayerController::class,'addPlayer']);
    $router->post('store-player',[\App\Controllers\PlayerController::class,'store']);
    $router->get('detail-player/{id}',[\App\Controllers\PlayerController::class,'detail']);
    $router->post('update-player/{id}',[\App\Controllers\PlayerController::class,'updatePlayer']);
    $router->get('destroy/{id}', [\App\Controllers\PlayerController::class, 'destroy']);
    // khu vực cần quan tâm -----------
    $router->get('club', [App\Controllers\ClubController::class, 'index']);
    $router->get('add-club',[\App\Controllers\ClubController::class,'addClub']);
    $router->post('store-club',[\App\Controllers\ClubController::class,'store']);
    $router->get('detail-club/{id}', [\App\Controllers\ClubController::class, 'detail']);
    $router->get('edit-club/{id}', [\App\Controllers\ClubController::class, 'edit']);
    $router->post('update-club/{id}', [\App\Controllers\ClubController::class, 'update']);
    $router->get('destroy-club/{id}', [\App\Controllers\ClubController::class, 'destroy']);

});

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>