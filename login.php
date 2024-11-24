<!-- login.php -->
<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // التحقق من صحة المدخلات
    // ... تحقق من اسم المستخدم وكلمة المرور في قاعدة البيانات

    // إذا كانت البيانات صحيحة
    $_SESSION['username'] = $username;
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">تسجيل الدخول</button>
        <a href="register.php">إنشاء حساب</a>
        <a href="reset_password.php">نسيت كلمة المرور؟</a>
    </form>
</body>
</html>
