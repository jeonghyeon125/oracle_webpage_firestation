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
  if (!$conn){
      $e = oci_error();
      trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
  }

  $userID = $_POST['userID'];
  $userPW = $_POST['userPW'];

  $sql = "SELECT userID, userPW FROM users WHERE userID='$userID'";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  $row = oci_fetch_array($sti);

  if($row == null){
      echo "<script>alert('아이디가 존재하지 않습니다.\\n회원가입을 한 후 다시 로그인을 시도해
주세요.')</script>";
      echo "<script>location.replace('login.php');</script>";
      exit;
  }else{
        if ($userID == $row[0] && $userPW == $row[1]) {
            $_SESSION['userID'] = $row[0];
            echo "<script>alert('직원으로 로그인되었습니다.')</script>";
            echo "<script>location.href='user_search.php';</script>";
        } else{
            echo "<script>alert('비밀번호가 잘못되었습니다.')</script>";
            echo "<script>location.href='login.php';</script>";
        }
  }
?>
