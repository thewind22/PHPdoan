<?php
include 'controllers/RoomController.php';
include 'controllers/UserController.php';

$userController = new UserController();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
session_start();
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập và hành động không phải là 'login' hoặc 'register', chuyển hướng đến trang đăng nhập
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action !== 'login' && $action !== 'register') {
        header("Location: index.php?action=login");
        exit;
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$roomId = isset($_GET['RoomID']) ? $_GET['RoomID'] : null;

$roomController = new RoomController();

switch ($action) {
    case 'index':
        $roomController->index();
        break;
    case 'add':
        $roomController->add();
        break;
    case 'edit':
        $roomController->edit($roomId);
        break;
    case 'delete':
        $roomController->delete($roomId);
        break;
    case 'details':
        $roomController->details($roomId);
        break;
    case 'login':
        // Nếu hành động là 'login', xử lý đăng nhập
        $userController->login();
        break;
        case 'register':
          
            $userController->register();
            break;
    case 'logout':
        // Nếu hành động là 'logout', kết thúc phiên đăng nhập và chuyển hướng đến trang đăng nhập
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    default:
        echo 'Invalid action.';
        break;
}
?>
