<?php
session_start();
include 'config.php';

$message = '';
$show_link = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    
    // تحقق من رقم الهاتف في قاعدة البيانات
    $stmt = $pdo->prepare("SELECT email FROM users WHERE phone = ?");
    $stmt->execute([$phone]);
    $user = $stmt->fetch();

    if ($user) {
        // هنا يمكنك إرسال رابط تغيير كلمة المرور عبر البريد الإلكتروني أو تخزينه في الجلسة
        // نستخدم الجلسة لعرض الرسالة
        $_SESSION['reset_link'] = "http://your-website.com/change_password.php"; // قم بتعديل الرابط
        $show_link = true;
    } else {
        $message = "رقم الهاتف غير صحيح.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>نسيت كلمة المرور</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .message {
            color: green;
            margin-top: 10px;
        }
    </style>
    <script>
        // وظيفة لتأخير عرض الرابط بعد 5 ثوانٍ
        function showLink() {
            setTimeout(function() {
                document.getElementById('resetLink').style.display = 'block';
            }, 5000);
        }
    </script>
</head>
<body>
    <form method="POST">
        <input type="text" name="phone" placeholder="رقم الهاتف" required>
        <button type="submit">تحقق</button>
    </form>

    <?php if ($message): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <?php if ($show_link): ?>
        <p class="message">تم التحقق بنجاح. سيتم عرض رابط تغيير كلمة المرور بعد 5 ثوانٍ.</p>
        <script>
            showLink();
        </script>
        <p id="resetLink" style="display:none;">
            <a href="<?= $_SESSION['reset_link'] ?>">اضغط هنا لتغيير كلمة المرور</a>
        </p>
    <?php endif; ?>
</body>
</html>
