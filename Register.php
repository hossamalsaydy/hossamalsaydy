<!-- register.php -->
<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // التحقق من صحة المدخلات
    // ... التحقق من تكرار اسم المستخدم، البريد الإلكتروني، إلخ.

    // إدخال البيانات في قاعدة البيانات
    $stmt = $pdo->prepare("INSERT INTO users (username, phone, email, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $phone, $email, $password]);
    
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="text" name="phone" placeholder="رقم الهاتف" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <input type="password" name="confirm_password" placeholder="تأكيد كلمة المرور" required>
        <button type="submit">إنشاء حساب</button>
    </form>
</body>
</html>
