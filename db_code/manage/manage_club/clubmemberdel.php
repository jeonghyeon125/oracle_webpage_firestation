<head><meta content="text/html; charset=utf-8"></head>
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
  $clubID = $_GET['clubID'];

  $select = "SELECT * FROM fsclub WHERE empID='$empID' and clubID='$clubID' ";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);

  if($row == null){
    echo "<script>alert('해당 동아리에 가입되어 있지 않습니다.')</script>";
    echo "<script>location.replace('clubmanmember.php');</script>";
    exit;
  }

  $sql = "DELETE FROM fsclub WHERE empID = '$empID' and clubID = '$clubID' ";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  echo "<script>alert('성공')</script>";
  echo "<script>location.replace('clubmanmember.php');</script>";

  oci_free_statement($check);
  oci_free_statement($sti);
 ?>

