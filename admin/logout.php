<?php 
// بداء جلسة
session_start();


// حذف كل الجلسات التي تم انشائها  داخل المتصفح
session_unset();

// تحطيم الجلسة
session_destroy();


header("location:admin.php")
?>