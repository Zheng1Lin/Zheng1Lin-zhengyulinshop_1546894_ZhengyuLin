<?php
if ($_POST['login']=="login") {
    // 获取前端传递的用户名和密码
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 在这里添加数据库连接代码
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "zhengyulinshop_1546894_zhengyulin";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 防止 SQL 注入攻击
    // $username = mysqli_real_escape_string($conn, $username);
    // $password = mysqli_real_escape_string($conn, $password);

    // 查询数据库
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "success";
        // 登录成功，你可以执行其他操作，例如跳转到 dashboard.html
    } else {
        echo "failure";
        // 登录失败，你可以在前端显示错误消息
    }

    $conn->close();
} else {
    // 非法访问，可以添加一些错误处理
    echo "Invalid access.";
}
?>
