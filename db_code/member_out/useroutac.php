<head><meta content="text/html; charset=utf-8"></head> <!-- 한글 안깨지게 -->
<?php

$db ='
(DESCRIPTION =
        (ADDRESS_LIST=
                (ADDRESS = (PROTOCOL=TCP) (HOST = 203.249.87.57) (PORT=1521))
        )
        (CONNECT_DATA =
        (SERVICE_NAME = orcl)
         )
)';

  $conn = oci_connect("DBA2022G6","test1234",$db,"AL32UTF8");

  $empID = $_POST['empID'];
  $userName = $_POST['userName'];
  $userID = $_POST['userID'];
  $userPW = $_POST['userPW'];


  $select = "SELECT empID, userName, userID, userPW FROM users WHERE userID='$userID'";
  $s_check = oci_parse($conn, $select);
  oci_execute($s_check);
  $row = oci_fetch_array($s_check);

  $sql = "DELETE FROM users WHERE empID = '$empID' and userName='$userName' and userID = '$userID'  and userPW='$userPW' ";

  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  if($row[0]!=$empID || $row[1]!=$userName || $row[2]!=$userID || $row[3]!=$userPW){
      echo "<script>alert('정보가 일치하지 않습니다.\\n정보를 다시 입력해주세요.')</script>";
      echo "<script>location.replace('userout.php');</script>";
    }else{
        echo "<script>alert('회원 탈퇴 성공')</script>";
        echo "<script>location.replace('login.php');</script>";
    }

  oci_free_statement($sti);
  oci_free_statement($s_check);
  oci_close($conn);
 ?>
