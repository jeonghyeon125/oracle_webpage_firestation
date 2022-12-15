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
  $empName = $_GET['empName'];
  $empTel = $_GET['empTel'];
  $fsID = $_GET['fsID'];
  $dept = $_GET['dept'];
  $Estatus = $_GET['Estatus'];

  $select = "SELECT empID FROM emp WHERE empID='$empID'";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);

  if($row != null){
    echo "<script>alert('해당 직원 번호가 이미 존재합니다.')</script>";
    echo "<script>location.replace('empmanadd.php');</script>";
    exit;
  }

  $sql = "INSERT INTO emp (empID,fsID,empName,empTel,dept,Estatus) VALUES ('$empID', '$fsID','$empName', '$empTel','$dept', '$Estatus')";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  $select2 = "SELECT empID,fsID,empName,empTel,dept,Estatus FROM emp WHERE empID='$empID' and fsID='$fsID' and empName='$empName' and empTel='$empTel' and dept='$dept' and Estatus='$Estatus'";
  $check2 = oci_parse($conn, $select2);
  oci_execute($check2);
  $row2 = oci_fetch_array($check2);

  if($row2[0]==$empID && $row2[1]==$fsID && $row2[2]==$empName && $row2[3]==$empTel && $row2[4]==$dept){
    echo "<script>alert('성공')</script>";
    echo "<script>location.replace('empmanadd.php');</script>";
}else{
    echo "<script>alert('실패')</script>";
    echo "<script>location.replace('empmanadd.php');</script>";
  }

  oci_free_statement($check);
  oci_free_statement($sti);
 ?>
