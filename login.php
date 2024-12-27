<?php
session_start();
require 'database.php';  // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // تحقق من اسم المستخدم وكلمة المرور في قاعدة البيانات
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
    } else {
        echo "بيانات الدخول غير صحيحة!";
    }
}
?>