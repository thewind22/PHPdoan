<?php
class User {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (UserName, Email, Password) VALUES ('$username', '$email', '$hashedPassword')";
        mysqli_query($this->connection, $query);
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE Email = '$email'";
        $result = mysqli_query($this->connection, $query);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['Password'])) {
            return $user;
        }
        return false;
    }

    public function getUserRoles($userId) {
        $query = "SELECT RoleName FROM roles WHERE RoleID IN (SELECT RoleID FROM user_roles WHERE UserID = '$userId')";
        $result = mysqli_query($this->connection, $query);
        $roles = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $roles[] = $row['RoleName'];
        }
        return $roles;
    }
}
?>
