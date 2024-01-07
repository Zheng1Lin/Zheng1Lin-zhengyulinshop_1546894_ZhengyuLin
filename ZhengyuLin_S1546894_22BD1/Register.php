<?php
if ($_POST['register']=="register") {
    // $servername = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "root";
    // $dbName = "zhengyulinshop";
    
    // 获取用户输入
    $regUsername = $_POST['username'];
    $regPassword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $con=mysqli_connect('localhost','root','root','zhengyulinshop_1546894_zhengyulin',3306);
    mysqli_query($con,"INSERT INTO users(username,password) VALUES ('$regUsername','$regPassword')");

    // $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // // 检查密码是否匹配
    // if ($regPassword != $confirmPassword) {
    //     echo "Passwords do not match.";
    //     exit();
    // }

    // 连接到数据库，做其他验证，例如检查用户名是否已存在

    // 假设你已经连接到数据库并有 $conn 变量
    // 在此处添加代码执行数据库连接和验证

    // 将用户信息插入数据库
    // $hashedPassword = password_hash($regPassword, PASSWORD_DEFAULT);
    // $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    // $stmt->bind_param("ss", $regUsername, $hashedPassword);

    // if ($stmt->execute()) {
    //     echo "Registration successful!";
    // } else {
    //     echo "Registration failed!";
    // }

    // $stmt->close();

    // $conn->close();
}
?>
