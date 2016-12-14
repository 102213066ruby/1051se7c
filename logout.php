<?php
       // 1. 啟動 Session
       session_start();
       // 2. 清除所有已登記的 Session 變數
       session_unset();
       // 3. 銷毀現有的 Session連線紀錄
       session_destroy();
       
       header("Location:loginForm.php");
?>