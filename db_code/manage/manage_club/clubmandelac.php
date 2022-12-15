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

  $clubID = $_GET['clubID'];

  $select = "SELECT * FROM club WHERE clubID='$clubID'";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);

  if($row == null){
    echo "<script>alert('해당 번호를 가진 동아리가 없습니다.')</script>";
    echo "<script>location.replace('clubmandeladd.php');</script>";
    exit;
  }

  $sql = "DELETE FROM club WHERE clubID = '$clubID' ";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  echo "<script>alert('성공')</script>";
  echo "<script>location.replace('clubmandeladd.php');</script>";

  oci_free_statement($check);
  oci_free_statement($sti);
 ?>
