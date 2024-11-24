<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    
    // تحقق من رقم الهاتف
    // إذا كان صحيحًا، أرسل رابط تغيير كلمة المرور
    // هنا يمكنك إضافة منطق إرسال بريد إلكتروني أو رسالة نصية
}

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>نسيت كلمة المرور</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST">
        <input type="text" name="phone" placeholder="رقم الهاتف" required>
        <button type="submit">تحقق</button>
    </form>
</body>
</html>
