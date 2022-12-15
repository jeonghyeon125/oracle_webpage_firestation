<?php

function getData(){
    $data = array();
    $data[1] = $_POST["name"];
    $data[3] = $_POST["id"];
    $data[4] = $_POST["pw"];
    $data[5] = $_POST["pw_check"];
    $usertel1 = $_POST["tele1"];
    $usertel2 = $_POST["tele2"];
    $usertel3 = $_POST["tele3"];
    $data[6] = $_POST["empid"];
    $data[6] = strval($data[6]);

    $usertel = $usertel1.$usertel2.$usertel3;
    $data[2] = $usertel;

    return $data;
}

$info = getData();  

if (strcmp($info[4],$info[5]) != 0){
    echo '<script>alert("비밀번호를 다시 입력하세요!"); history.back();</script>';
    exit;
}
$db ='
 (DESCRIPTION =
        (ADDRESS_LIST =
                (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
        )
)';

// connect with oracle_db
$con = oci_connect("DBA2022G6","test1234",$db);

// oracle db connection error message
if (!$con) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
}

//id 중복검사
$id = "select USERID from users where USERID = '$info[3]'";
$id_test = oci_parse($con,$id);
oci_execute($id_test);

$count = 0;

while ($row = oci_fetch_array($id_test,OCI_BOTH) != false){
    $count = $count + 1;  //행이 존재할때마다 +1;
}

if ($count != 0){   //행이 존재하지 않는다면 count는 0, 즉 존재하면 0 이상.
    echo '<script>alert("중복된 ID가 존재합니다."); history.back();</script>';
    exit;
}

//pw 중복검사
$pw = "select USERPW from users where USERPW = '$info[4]'";
$pw_test = oci_parse($con,$pw);
oci_execute($pw_test);

while ($row = oci_fetch_array($pw_test,OCI_BOTH) != false){
    $count = $count + 1;  //행이 존재할때마다 +1;
}

if ($count != 0){   //행이 존재하지 않는다면 count는 0, 즉 존재하면 0 이상.
    echo '<script>alert("중복된 pw가 존재합니다."); history.back();</script>';
    exit;
}

//emp id 검사

$empid_check = "select empid from emp where empid = '$info[6]'";
$eid_ck = oci_parse($con,$empid_check);
oci_execute($eid_ck);

while ($row = oci_fetch_array($eid_ck,OCI_BOTH) != false){
    $count = $count + 1;  //행이 존재할때마다 +1;
}

if ($count == 0){   //행이 존재하지 않는다면 count는 0, 즉 존재하면 0 이상.
    echo '<script>alert("올바른 아이디를 입력하십시오."); history.back();</script>';
    exit;
}

$count = 0;

// emp 이름 검사

$empname_check = "select empname from emp where empname = '$info[1]'";
$enm_ck = oci_parse($con,$empname_check);
oci_execute($enm_ck);

while ($row = oci_fetch_array($enm_ck,OCI_BOTH) != false){
    $count = $count + 1;  //행이 존재할때마다 +1;
}

if ($count == 0){   //행이 존재하지 않는다면 count는 0, 즉 존재하면 0 이상.
    echo '<script>alert("올바른 이름을  입력하십시오."); history.back();</script>';
    exit;
}

$count = 0;

//emp tel 확인

$emptel_check = "select emptel from emp where emptel = '$info[2]'";
$etel_ck = oci_parse($con,$emptel_check);
oci_execute($etel_ck);

while ($row = oci_fetch_array($etel_ck,OCI_BOTH) != false){
    $count = $count + 1;  //행이 존재할때마다 +1;
}

if ($count == 0){   //행이 존재하지 않는다면 count는 0, 즉 존재하면 0 이상.
    echo '<script>alert("올바른 전화번호를  입력하십시오."); history.back();</script>';
    exit;
}

if (isset($_POST['join'])){
    $join = "INSERT INTO USERS(EMPID, USERNAME, USERTEL, USERID, USERPW)
     VALUES ('$info[6]','$info[1]','$info[2]','$info[3]', '$info[4]')";

    $stid = oci_parse($con, $join);
    oci_execute($stid);
}
oci_free_statement($uno_count);
oci_close($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>회원가입 완료</title>
    </head>
    <style>
        header{
        text-align: center;
        }
        nav{
        text-align: center;
        }
        a{
        text-decoration : none black;  color : inherit;
        }
    </style>
    <body>
        <header>
       <a href="http://software.hongik.ac.kr/a_team/a_team6/user_search.php"><h1>MAIN PAGE</h1></a>
        </header>
        <nav>
             <h1 >Sign Up Completed!</h1>
        </nav>

	<hr color ="#73C6B6" width="650px" size="5px">
        <section>

        </section>
    </body>
</html>







