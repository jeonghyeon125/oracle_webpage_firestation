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
if ( !$con = oci_connect("DBA2022G6","test1234",$db,"AL32UTF8")) exit();

$empID = $_POST["empID"];
$userName = $_POST["userName"];
$userTel = $_POST["userTel"];
$userID = $_POST["userID"];
$userPW = $_POST["userPW"];
$AdminCode = $_POST["AdminCode"];


$sql ="UPDATE users SET empID='$empID', userName='$userName',userTel='$userTel', userID='$userID', userPW='$userPW', AdminCode='$AdminCode' WHERE empID='$empID'";
$ret = oci_execute( oci_parse($con, $sql) );

  if(isset($ret)){
        echo "<script>alert('성공!')</script>";
        echo "<script>location.href='usermandelpage.php';</script>";
    }
    else{
        echo "<script>alert('실패')</script>";
        echo "<script>location.href='usermandelpage.php';</script>";
  }

  oci_free_statement($ret);
oci_close($con);
?>

