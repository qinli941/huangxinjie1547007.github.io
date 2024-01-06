<?php
include 'db_connection.php';

// 处理登录表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // 查询数据库中是否存在匹配的用户名和密码
    // 假设用户表为 users，包含 username 和 password 字段
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        // 登录成功
        // 可以在此处设置一个变量来表示认证成功，例如：
        $authentication_successful = true;
        
        echo "Welcome";
    } else {
        echo "usernameORpassword wrong";
    }
}

$conn->close();

// 在这里进行重定向
if ($authentication_successful) {
    // 登录成功后的处理逻辑
    
    // 跳转到 zhuye.html 页面
    header("Location: zhuye.html");
    exit; // 确保在进行重定向之后立即退出脚本执行
} else {
    // 认证失败的处理逻辑
    echo "please relogin";
}
?>