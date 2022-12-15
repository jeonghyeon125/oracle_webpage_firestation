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

  $empID = $_GET['empID'];
  $userName = $_GET['userName'];
  $userTel = $_GET['userTel'];
  $userID = $_GET['userID'];
  $userPW = $_GET['userPW'];
  $AdminCode = $_GET['AdminCode'];

  $select = "SELECT empID FROM users WHERE empID='$empID'";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);

  if($row != null){
    echo "<script>alert('이미 가입한 직원입니다.')</script>";
    echo "<script>location.replace('usermanadd.php');</script>";
    exit;
  }

  if($empID == null || $userName == null || $userTel == null || $userID == null || $userPW == null){
    echo "<script>alert('정보를 모두 작성해주세요.')</script>";
    echo "<script>location.replace('usermanadd.php');</script>";
    exit;
  }

  $sql = "INSERT INTO users (empID,userName,userTel,userID,userPW,AdminCode) VALUES ('$empID', '$userName', '$userTel', '$userID','$userPW','$AdminCode')";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  $select2 = "SELECT empID FROM users WHERE empID='$empID'";
  $check2 = oci_parse($conn, $select2);
  oci_execute($check2);
  $row2 = oci_fetch_array($check2);

  if($row2[0]==$empID){
    echo "<script>alert('성공')</script>";
    echo "<script>location.replace('usermanadd.php');</script>";
  }else{
    echo "<script>alert('실패')</script>";
    echo "<script>location.replace('usermanadd.php');</script>";
  }

  oci_free_statement($check);
  oci_free_statement($check2);
  oci_free_statement($sti);
  oci_close($conn);
