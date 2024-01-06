<?php
$servername = "localhost:3366"; // 数据库服务器名称
$username = "root"; // 数据库用户名
$password = ""; // 数据库密码
$dbname = "pauls1547007"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername,$username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
?>