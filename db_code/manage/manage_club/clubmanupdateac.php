<head><meta content="text/html; charset=utf-8"></head>
<?php
$db ='
(DESCRIPTION =
        (ADDRESS_LIST=
                (ADDRESS = (PROTOCOL=TCP) (HOST = 203.249.87.57) (PORT=1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
         )
)';
if ( !$conn = oci_connect("DBA2022G6","test1234",$db,"AL32UTF8")) exit();

$clubID = $_POST["clubID"];
$clubName = $_POST["clubName"];

$sql ="UPDATE club SET clubID='$clubID', clubName='$clubName' WHERE clubID='$clubID'";
$sti = oci_parse($conn, $sql);
oci_execute($sti);

$select = "SELECT * FROM club WHERE clubID='$clubID'";
$check = oci_parse($conn, $select);
oci_execute($check);
$row = oci_fetch_array($check);

if($row[0]==$clubID && $row[1]==$clubName){
  echo "<script>alert('성공')</script>";
  echo "<script>location.replace('clubmandeladd.php');</script>";
}else{
  echo "<script>alert('실패')</script>";
  echo "<script>location.replace('clubmandeladd.php');</script>";
}

oci_free_statement($check);
oci_close($con);
?>
