<html>
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

  $select = "SELECT empID FROM emp WHERE empID='$empID'";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);

  if($row == null){
    echo "<script>alert('해당 번호를 가진 직원이 없습니다.')</script>";
    echo "<script>location.replace('empmandelpage.php');</script>";
    exit;
  }

  $sql = "DELETE FROM emp WHERE empID = '$empID' ";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  echo "<script>alert('성공')</script>";
  echo "<script>location.replace('empmandelpage.php');</script>";

  oci_free_statement($check);
  oci_free_statement($sti);
  oci_close($conn);
 ?>
