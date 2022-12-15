<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<style>
:root {
  --text-color: black;
  --background-color: #8aa1a1;
  --accent-color: #99a7a7;
  --icons-color: rgb(152, 187, 201);
}
h1{text-align: center;}
h2{text-align: center;}
body {margin: 0; background-color: var(--bodybackground-color); font-family: 'STIX Two Math';}

a { text-decoration: none; color: var(--text-color);}

.navbar {display: flex; justify-content: space-between; align-items: center; background-color: var(--background-color);
  padding: 8px 12px; font-family: 'STIX Two Math'; opacity: 0.7;}

.navbar__logo i { color: var(--accent-color); padding-left: 0;}

.navbar__menu { list-style: none; display: flex; margin: 5px; padding-left: 0;}

.navbar__menu li { padding: 8px 30px;}
.navbar a { color: rgb(32, 32, 32); font-weight: 700; font-size: 20px;}

.navbar__icons { list-style: none; display: flex; color: var(--icons-color); margin: 0; padding-left: 0;}

.navbar__icons li { padding: 8px 12px; margin: 0;}

.navbar__menu li:hover { background-color: var(--accent-color); border-radius: 3px;}
.outer-div { position: relative; width: 50%;}
hr {width : 80%; height : 3px; background-color : #8aa1a1; border : 0; margin: 0px auto;}
.idcheck{padding: 10px; text-align: center; font-size: large;}
.logout_button{ border: 2px solid #8aa1a1; background-color: white; color: black;}
#search {border: 2px solid #8aa1a1; background-color: white; color: black;}

.idcheck{padding: 10px; text-align: center; font-size: large;;}

.layout{ max-width: 100%; margin: 0 auto; padding: 20px; display: flex; flex-wrap: nowrap; gap: 1em;}
article{flex-basis: 680px; flex-grow: 1; flex-shrink: 1; background-color: white;}
.flexbox{ display: flex; flex-wrap: wrap; gap: 1em; padding: 10px; background-color: white;}
.item{ min-height: 400px; flex-basis: 150px; flex-shrink: 1; flex-grow: 1; margin: 0 auto; text-align: center; }



@media screen and (max-width: 700px) {
 .navbar {flex-direction: column; align-items: flex-start; margin: 0;}
 .navbar__menu { flex-direction: column; align-items: center; width: 100%;}
 .navbar__menu li { width: 100%; text-align: center; }
 .navbar__icons {display: none; justify-content: center; width: 100%;}

}
</style>
 <title>사용자 | 직원 조회</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    </script>
</head>
<body>
  <button style = "float:right" id="search" onclick = "window.open('admin_login.php');">관리자 페이지</button>
  <form action="logout_check.php">
    <input type="submit" value="로그아웃" class="logout_button">
 </form>
  <hr>

  <div class="idcheck">
  <?php
      session_start();
      // 세션 아이디 확인
      if(isset($_SESSION['userID'])){
          echo "<b>".$_SESSION['userID']."</b>";?><b>님 접속중</b>
  <?php
      }
      else{
          echo "<script>location.href='login.php';</script>";
      }
  ?>
  </div>
  <hr><br><br>
  <nav class="navbar">

      <div class="navbar__logo">
        <i class="fas fa-blog"></i>
        <a href="user_search.php">MAIN HOME</a>
      </div>

      <ul class="navbar__menu">
        <li>
          <a href="liveaction.php" target="frame">실시간 출동현황</a>
        </li>
        <li>
          <a href="useremprefer.php" target="frame">직원 조회</a>
        </li>
        <li>
          <a href="usertruckrefer.php" target="frame">소방차량 조회</a>
        </li>
        <li>
          <a href="userclubrefer.php" target="frame">동아리 조회</a>
  </li>
  </ul>
  <ul class="navbar__icons"></ul>
  </nav>
<br><br>
<div class="layout">
  <article>
  <br><br>
  <div class="flexbox">
    <div class="item">
    <form action = "userclubrefer.php" method="get">
            <h4>==분류 조회==</h4>
                        <select name="areaName">
                            <option>== 관할구역 ==</option>
                            <option>ansan</option>
                            <option>goyang</option>
                            <option>namyangju</option>
                            <option>seongnam</option>
                            <option>yongin</option>
                        </select>
                        <select name="fsName">
                            <option>== 안전센터 ==</option>
                            <optgroup label="ansan">
                                <option>wolpi</option>
                                <option>gunja</option>
                            </optgroup>
                            <optgroup label="goyang">
                                <option>wondang</option>
                                <option>hangsin</option>
                            </optgroup>
                            <optgroup label="namyangju">
                                <option>peongnae</option>
                                <option>waboo</option>
                            </optgroup>
                            <optgroup label="seongnam">
                                <option>sujin</option>
                                <option>sinheung</option>
                            </optgroup>
                            <optgroup label="yongin">
                                <option>yeokbuk</option>
                                <option>suji</option>
                            </optgroup>
                        </select>
              <input type="submit" value="조회" onclick="send()"><br><br>
        </form>
        <div style="white-space:nowrap; overflow:auto;  width:80%; height:200px; margin: auto;">
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

   $areaName = $_REQUEST['areaName'];
   $fsName = $_REQUEST['fsName'];

   $sql="SELECT club.clubName, emp.empID, emp.empName, firestation.areaName, firestation.fsName, emp.dept
   FROM emp
   inner JOIN firestation
   ON emp.fsID = firestation.fsID
   inner JOIN fsclub
   ON emp.empID = fsclub.empID
   inner JOIN club
   ON fsclub.clubID = club.clubID WHERE firestation.areaName='$areaName' AND firestation.fsName='$fsName'";
   $stat = oci_parse($con, $sql);
   $ret = oci_execute($stat);

   if(!$ret) {  // 오류라면 메시지 출력하고 종료
           echo "SQL문 오류"."<br>";
           exit();
   }

   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>소속 동아리</TH><TH>직원 ID</TH><TH>이름</TH><TH>관할 지역</TH><TH>안전 센터</TH><TH>부서</TH>";
   echo "</TR>";

   while(($row = oci_fetch_array($stat, OCI_BOTH)) != false) {
          echo "<TR>";
          echo "<TD>", $row[0], "</TD>";
          echo "<TD>", $row[1], "</TD>";
          echo "<TD>", $row[2], "</TD>";
          echo "<TD>", $row[3], "</TD>";
          echo "<TD>", $row[4], "</TD>";
          echo "<TD>", $row[5], "</TD>";
          echo "</TR>";
   }
   echo "</TABLE>";
   if(!$ret) {  // 오류라면 메시지 출력하고 종료
    echo "SQL문 오류"."<br>";
    exit();
}

   oci_free_statement($stat);
?>
</div>
<form method="get" name="form" action="userclubrefer.php">
          <h4>==검색 조회==</h4>
              직원번호로 조회&ensp;&ensp;&ensp;<input type="text" name="empID" placeholder="번호만 입력">
              <input type="submit" value="조회" onclick="send()"><br>
              이름으로 조회&emsp;&emsp;&ensp;<input type="text" name="empName" placeholder="영어로 입력">
              <input type="submit" value="조회" onclick="send()"><br>
              동아리명으로 조회&emsp;<input type="text" name="clubName" placeholder="영어로 입력">
              <input type="submit" value="조회" onclick="send()"><br><br>
          </form>
        <br>
<div style="white-space:nowrap; overflow:auto;  width:80%; height:300px; margin: auto;">
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
$clubName = $_GET['clubName'];

$sql = "SELECT club.clubName, emp.empID, emp.empName, firestation.areaName, firestation.fsName, emp.dept
FROM emp
inner JOIN firestation
ON emp.fsID = firestation.fsID
inner JOIN fsclub
ON emp.empID = fsclub.empID
inner JOIN club
ON fsclub.clubID = club.clubID WHERE emp.empID='$empID' OR emp.empName='$empName' OR club.clubName='$clubName'";

$stat = oci_parse($con, $sql);
$ret = oci_execute($stat);
if(!$ret) {  // 오류라면 메시지 출력하고 종료
 echo "SQL문 오류"."<br>";
 exit();
}

echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>소속 동아리</TH><TH>직원 ID</TH><TH>이름</TH><TH>관할 지역</TH><TH>안전 센터</TH><TH>부서</TH>";
echo "</TR>";

while(($row = oci_fetch_array($stat, OCI_BOTH)) != false) {
    echo "<TR>";
    echo "<TD>", $row[0], "</TD>";
    echo "<TD>", $row[1], "</TD>";
    echo "<TD>", $row[2], "</TD>";
    echo "<TD>", $row[3], "</TD>";
    echo "<TD>", $row[4], "</TD>";
    echo "<TD>", $row[5], "</TD>";
    echo "</TR>";
}
echo "</TABLE>";

oci_free_statement($stat);
?>
</div>


</div></div>
</article>
</div>
</body>
</html>



