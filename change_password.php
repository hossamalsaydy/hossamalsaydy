<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    
    // تحديث كلمة المرور في قاعدة البيانات
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->execute([$new_password, $_SESSION['username']]);
    
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تغيير كلمة المرور</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST">
        <input type="password" name="new_password" placeholder="كلمة المرور الجديدة" required>
        <button type="submit">تغيير كلمة المرور</button>
    </form>
</body>
</html>
