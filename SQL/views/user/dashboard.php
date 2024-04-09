<?php
    session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// Xử lý yêu cầu đăng xuất nếu người dùng nhấn nút Logout
if (isset($_POST['logout'])) {
    // Hủy bỏ phiên đăng nhập
    unset($_SESSION['user']);
    session_destroy();
    // Chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['UserName']; ?>!</h1>
    <p>Your email: <?php echo $user['Email']; ?></p>
    <p>Your roles:</p>
    <ul>
        <?php foreach ($user['roles'] as $role): ?>
            <li><?php echo $role; ?></li>
        <?php endforeach; ?>
    </ul>
    <!-- Biểu mẫu để gửi yêu cầu đăng xuất -->
    <form method="POST" action="">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
