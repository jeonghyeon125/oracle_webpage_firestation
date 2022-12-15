<head><meta content="text/html; charset=utf-8"></head>
<?php
  session_start();
  $db ='
  (DESCRIPTION =
        (ADDRESS_LIST=
                (ADDRESS = (PROTOCOL=TCP) (HOST = 203.249.87.57) (PORT=1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
         )
         )';

  $conn = oci_connect("DBA2022G6","test1234",$db,"AL32UTF8");

  $userID = $_SESSION['userID'];
  $adminCode = $_POST['adminCode'];

  $sql = "SELECT * FROM users WHERE userID='$userID'";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  while ($row = oci_fetch_array($sti)){
    if ($userID==$row[3] && $adminCode==$row[5]){
       $_SESSION['adminCode'] = $row[5];
       echo "<script>alert('관리자 로그인 성공!')</script>";
       echo "<script>location.href='http://software.hongik.ac.kr/a_team/a_team6/managemain.php';</script>";
    } else {
      echo "<script>alert('관리자 코드가 잘못되었습니다.')</script>";
      echo "<script>location.href='admin_login.php';</script>";
    }
  }

 ?>
