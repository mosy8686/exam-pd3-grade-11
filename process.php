<?php
// ۱. چک میکنیم آیا دیتا ارسال شده
// ۲. دریافت اطلاعات از فرم
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// ۳. بررسی پر بودن همه فیلدها
if (empty($fullname) || empty($email) || empty($password) || empty($repassword)) {
    showIcon('❌');
    exit;
}

// ۴. بررسی فرمت ایمیل
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    showIcon('❌');
    exit;
}

// ۵. بررسی طول رمز عبور
if (strlen($password) < 8) {
    showIcon('❌');
    exit;
}

// ۶. مطابقت رمزها
if ($password !== $repassword) {
    showIcon('❌');
    exit;
}

// اگر همه چیز درست بود
showIcon('✅');


// تابع نمایش آیکون
function showIcon($icon)
{
    echo '
    <html>
    <style>
    body {
        background: #000;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100px;
        color: ' . ($icon === '✅' ? '#00ff00' : '#ff0000') . ';
    }
    </style>
    <body>
        ' . $icon . '
    </body>
    </html>
    ';
}
?>