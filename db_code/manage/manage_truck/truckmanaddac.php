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

  $truckID = $_GET['truckID'];
  $fsID = $_GET['fsID'];
  $Made = $_GET['Made'];
  $Cyear = $_GET['Cyear'];
  $Tstatus = $_GET['Tstatus'];

  $select = "SELECT truckID FROM fireT WHERE truckID='$truckID'";
  $check = oci_parse($conn, $select);
  oci_execute($check);
  $row = oci_fetch_array($check);

  if($row != null){
    echo "<script>alert('해당 소방차량이 이미 존재합니다.')</script>";
    echo "<script>location.replace('truckmanadd.php');</script>";
    exit;
  }

  $sql = "INSERT INTO fireT (truckID,fsID,Made,Cyear,Tstatus) VALUES ('$truckID', '$fsID', '$Made', '$Cyear', '$Tstatus')";
  $sti = oci_parse($conn, $sql);
  oci_execute($sti);

  $select2 = "SELECT truckID,fsID,Made,Cyear,Tstatus FROM fireT WHERE truckID='$truckID' and fsID='$fsID' and Made='$Made' and Cyear='$Cyear' and Tstatus='$Tstatus'";
  $check2 = oci_parse($conn, $select2);
  oci_execute($check2);
  $row2 = oci_fetch_array($check2);

  if($row2[0]==$truckID && $row2[1]==$fsID && $row2[2]==$Made && $row2[3]==$Cyear && $row2[4]==$Tstatus){
    echo "<script>alert('성공')</script>";
    echo "<script>location.replace('truckmanadd.php');</script>";
}else{
    echo "<script>alert('실패')</script>";
    echo "<script>location.replace('truckmanadd.php');</script>";
  }

  oci_free_statement($check);
  oci_free_statement($check2);
  oci_free_statement($sti);
  oci_close($conn);
 ?>
