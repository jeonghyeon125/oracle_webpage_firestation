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

$truckID = $_POST["truckID"];
$fsID = $_POST["fsID"];
$Made = $_POST["Made"];
$Cyear = $_POST["Cyear"];
$Tstatus = $_POST["Tstatus"];

$sql ="UPDATE fireT SET truckID='$truckID', fsID='$fsID', Made='$Made', Cyear='$Cyear', Tstatus='$Tstatus' WHERE truckID='$truckID'";
$ret = oci_execute(oci_parse($con, $sql));

if(isset($ret)){
        echo "<script>alert('성공!')</script>";
        echo "<script>location.href='truckmandelpage.php';</script>";
}
else{
        echo "<script>alert('실패')</script>";
        echo "<script>location.href='truckmandelpage.php';</script>";
}

oci_free_statement($ret);
oci_close($con);
?>

