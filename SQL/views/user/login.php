<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <h1>User Login</h1>
    <?php if(isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?action=login">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
        <!-- Thay thế liên kết "register" bằng nút "Register" -->
        <button type="button" onclick="window.location.href='index.php?action=register';">Register</button>
    </form>
</body>
</html>
