<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/kit_code.js" crossorigin="anonymous">
    </script>
    <title>Nav Bar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      function send(){
        document.form.submit();
      }
    </script>
</head>
<style>
    :root {
    --text-color: black;
    --background-color: #8aa1a1;
    --accent-color: #8aa1a1;
    --icons-color: rgb(152, 187, 201);
    }
    h1{text-align: center;}
    h2{text-align: center;}
    body {margin: 0; background-color: var(--bodybackground-color); font-family: 'STIX Two Math';}

    a { text-decoration: none; color: var(--text-color);}

    .navbar { display: flex; justify-content: space-between; align-items: center; background-color: var(--background-color); padding: 8px 12px;
    font-family: 'STIX Two Math'; opacity: 0.7; text-align: center;}

    .navbar__logo i {color: var(--accent-color); padding-left: 0;}

    .navbar__menu {list-style: none; display: flex; margin: 5px; padding-left: 0; text-align: center;}

    .navbar__menu li {padding: 8px 30px;}

    .navbar a { color: rgb(32, 32, 32); font-weight: 700; font-size: 20px;}

    .navbar__icons { list-style: none; display: flex; color: var(--icons-color); margin: 0; padding-left: 0;}

    .navbar__icons li {padding: 8px 12px; margin: 0;}

    .navbar__menu li:hover { background-color: #8aa1a1; border-radius: 3px;}

    .outer-div { position: relative; width: 50%;}

    hr {width : 80%; height : 3px; background-color : #8aa1a1; border : 0; margin: 0px auto;}

    #search {border: 2px solid #8aa1a1; background-color: white; color: black;}

    .layout{max-width: 100%; margin: 0 auto; padding: 20px; display: flex; flex-wrap: nowrap; gap: 1em;}

    .submenu > li { line-height: 50px; background-color: #8aa1a1; text-align: center; padding: 15px 15px 0 0;}

    li{list-style:none}

    .idcheck{padding: 10px; text-align: center; font-size: large;}
    .submenu { height: 0; overflow: hidden;   text-align: center; padding: 0 15px;}

    .navbar__menu > li:hover { background-color: #8aa1a1; transition-duration: 0.5s;}

    .navbar__menu > li:hover .submenu {height: 200px; transition-duration: 1s;}

    article{flex-basis: 680px; flex-grow: 1; flex-shrink: 1; background-color: white;}

    @media screen and (max-width: 700px) {
    .navbar {flex-direction: column; align-items: flex-start;margin: 0;}
    .navbar__menu { flex-direction: column; align-items: center; width: 100%;}
    .navbar__menu li { width: 100%; text-align: center; }
    .navbar__icons {display: none; justify-content: center; width: 100%;}
    }
 </style>

  <header><br><h1>&nbsp;관리자 페이지</h1><br></header>

  <div class="idcheck">
    <?php
    session_start();
    // 세션 아이디 확인
    if(isset($_SESSION['adminCode']) && $_SESSION['userID']){
      echo "<b>관리자".$_SESSION['userID']."<b>";?><b>님 안녕하세요</b>
      <?php
    } else{
      if(isset($_SESSION['userID'])){
        echo "<script>alert('관리자 로그인이 필요합니다.')</script>";
        echo "<script>location.href='admin_login.php';</script>";
      }
      else{
        echo "<script>alert('로그인이 필요합니다.\\n직원 로그인 후 관리자 로그인을 진행해주세
요')</script>";
        echo "<script>location.href='login.php';</script>";
      }
    }
  ?>
  </div><br><br>
<nav class="navbar">
    <div class="navbar__logo">
    <i class="fas fa-blog"></i>
    <a href="">MAIN HOME</a>
    </div>

    <ul class="navbar__menu">
    <li>
        <a href="ddd.php" target="frame">직원 DATA 관리</a>
        <ul class="submenu">
            <li><a href="emprefer.php" target="frame">&nbsp;&nbsp;DATA 조회</a></li>
            <li><a href="empmandelpage.php" target="frame">수정 및 삭제</a></li>
            <li><a href="empmanadd.php" target="frame">추가</a></li>
        </ul>
    </li>
    <li>
        <a href="useremprefer.php" target="frame">소방차량 DATA 관리</a>
        <ul class="submenu">
            <li><a href="firetruckrefer.php" target="frame">조회</a></li>
            <li><a href="truckmandelpage.php" target="frame">수정 및 삭제</a></li>
            <li><a href="truckmanadd.php" target="frame">추가</a></li>
        </ul>
    </li>
    <li>
        <a href="usertruckrefer.php" target="frame">일반회원 DATA 관리</a>
        <ul class="submenu">
            <li><a href="userrefer.php" target="frame">조회</a></li>
            <li><a href="usermandelpage.php" target="frame">수정 및 삭제</a></li>
            <li><a href="usermanadd.php" target="frame">추가</a></li>
        </ul>
    </li>
    <li>
        <a href="userclubrefer.php" target="frame">동아리 DATA 관리</a>
        <ul class="submenu">
            <li><a href="clubrefer.php" target="frame">조회</a></li>
            <li><a href="clubmandeladd.php" target="frame">추가/변경/삭제</a></li>
            <li><a href="clubmanmember.php" target="frame">동아리 회원 관리</a></li>
        </ul>
    </li>
    </ul>
    <ul class="navbar__icons"></ul>
</nav>

 <body>
   <div>
   <h2>동아리 회원 변경</h2><br>

        <form method="get" name="form" action="clubmanmember.php">
            <h4>==동아리 가입 상태 확인==</h4>
            직원번호로 조회&ensp;&ensp;<input type="text" name="empID" placeholder="번호만 입
력">
            <input type="submit" value="조회" onclick="send()"><br>
            이름으로 조회&emsp;&emsp;<input type="text" name="empName" placeholder="영어로 입
력">
            <input type="submit" value="조회" onclick="send()"><br><br>
        </form>
        <form method="get" name="form" action="clubmemberadd.php">
            <h4>==동아리 가입==</h4>
            회원 번호&emsp;&nbsp;<input type="text" name="empID" placeholder="번호만 입력"><br>
            동아리 번호&nbsp;<input type="text" name="clubID" placeholder="번호만 입력"><br>
            <input type="submit" value="가입" onclick="send()"><br><br>
        </form>

        <form method="get" name="form" action="clubmemberdel.php">
            <h4>==동아리 탈퇴==</h4>
            회원 번호&emsp;&nbsp;<input type="text" name="empID" placeholder="번호만 입력"><br>
            동아리 번호&nbsp;<input type="text" name="clubID" placeholder="번호만 입력"><br>
            <input type="submit" value="탈퇴" onclick="send()"><br><br>
        </form>

    </div>
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
         
    $empName = $_GET['empName'];
    $empID = $_GET['empID'];
    $sql = "SELECT emp.empID, emp.dept, emp.empName, club.clubID, club.clubName
            FROM emp
            inner JOIN fsclub
            ON emp.empID = fsclub.empID
            inner JOIN club
            ON fsclub.clubID = club.clubID
            WHERE emp.empID = '$empID' or emp.empName = '$empName'
            Order by emp.empID, club.clubID";
         
    $stat = oci_parse($con, $sql);
    $ret = oci_execute($stat);
    if(!$ret) {  // 오류라면 메시지 출력하고 종료
            echo "SQL문 오류!!!"."<br>";
            exit();        
    }
         
    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH>직원 번호</TH><TH>소속 부서</TH><TH>직원 이름</TH><TH>동아리 번호</TH><TH>소속 >동아리</TH>";
    echo "</TR>";
         
    while(($row = oci_fetch_array($stat, OCI_BOTH)) != false) {
        echo "<TR>";
        echo "<TD>", $row[0], "</TD>";
        echo "<TD>", $row[1], "</TD>";
        echo "<TD>", $row[2], "</TD>";
        echo "<TD>", $row[3], "</TD>";
        echo "<TD>", $row[4], "</TD>";
        echo "</TR>";
    }
    echo "</TABLE>";
         
    oci_free_statement($stat);
?>
<br><br>
</body>
</html>
         