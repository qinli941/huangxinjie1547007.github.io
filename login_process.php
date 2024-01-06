<?php
// 连接到MySQL数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paul1547007";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 连接成功，可以执行其他操作

// 关闭数据库连接
$conn->close();


// 处理表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 在数据库中验证用户输入
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // 登录成功
        echo "登录成功！";
    } else {
        // 登录失败
        echo "用户名或密码错误！";
    }
}

$conn->close();
?>
