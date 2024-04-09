<?php
include 'models\User.php';

class UserController {
    private $userModel;

    public function __construct() {
        include 'models\db_connection.php';
        $this->userModel = new User($connection);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->register($username, $email, $password);
            header("Location: index.php?action=login");
            exit;
        }
        include 'views/user/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: index.php?action=index");
                exit; // Thêm exit ở đây để ngăn chặn việc thực thi mã tiếp theo
            } else {
                $error = "Invalid email or password";
            }
        }
        include 'views/user/login.php';
    }
    

    public function logout() {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
?>
