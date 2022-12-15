<?php
    session_start();
    $result = session_destroy(); // 세션 닫음

    if($result){
        echo "<script>alert('로그아웃 되었습니다.')</script>";
        echo "<script>location.href='login.php';</script>";
    }

    // db 연결 해제
    oci_close($con);
?>
