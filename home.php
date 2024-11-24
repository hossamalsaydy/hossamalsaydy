<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الصفحة الرئيسية</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>شئ إن وكلاء</h1>
        <nav>
            <a href="register.php">إنشاء حساب جديد</a>
            <a href="logout.php">تسجيل الخروج</a>
        </nav>
    </header>
    <main>
        <!-- عرض صور المنتجات -->
        <div class="products">
            <div class="product">
                <img src="path/to/image.jpg" alt="Product Image">
                <p>وصف المنتج</p>
                <button>شراء</button>
            </div>
            <!-- كرر المنتج كما تريد -->
        </div>
    </main>
</body>
</html>
