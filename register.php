<?php
include 'db_connection.php';

// 处理注册表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    // 验证数据的有效性，例如检查用户名是否唯一
    // 假设用户表为 users，包含 username 和 password 字段
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "Username already exists";
    } elseif ($password !== $confirm_password) {
        echo "Confirm password does not match the password";
    } else {
        // 将数据插入到数据库中
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($sql) === true) {
            // 注册成功后重定向到 index.html 页面
            header("Location: index.html");
            exit;
        } else {
            echo "Error! Failed: " . $conn->error;
        }
    }
}

$conn->close();
?>