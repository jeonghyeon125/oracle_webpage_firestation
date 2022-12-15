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

  $select = "SELECT * FROM fsclub WHERE clubID='$clubID' and empID='$empID' ";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);
  if($row != null){
        echo "<script>alert('이미 가입된 동아리입니다.')</script>";
        echo "<script>location.replace('clubmanmember.php');</script>";
        exit;
  }

  $sql = "INSERT INTO fsclub (empID, clubID) VALUES ('$empID','$clubID')";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  $select2 = "SELECT * FROM fsclub WHERE clubID='$clubID' and empID='$empID' ";
  $check2 = oci_parse($conn, $select2);
  oci_execute($check2);
  $row = oci_fetch_array($check2);
  if($row[0]==$empID && $row[1]==$clubID){
        echo "<script>alert('성공')</script>";
        echo "<script>location.replace('clubmanmember.php');</script>";
  }else{
        echo "<script>alert('실패')</script>";
        echo "<script>location.replace('clubmanmember.php');</script>";
  }

  oci_free_statement($check);
  oci_free_statement($check2);
  oci_free_statement($sti);
?>