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

    // 将用户信息插入到数据库中
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // 注册成功
        echo "注册成功！";
    } else {
        // 注册失败
        echo "注册失败！" . $conn->error;
    }
}

$conn->close();
?>
