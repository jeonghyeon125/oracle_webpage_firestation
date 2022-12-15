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
 <title>관리자 | 메인</title>
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
<h3>==실시간 출동현황 파악==</h3>
<br><br>
<div class="layout">
  <article>
  <br><br>
  <div class="flexbox">
    <div class="item">
      <div id="jb-content">
        <section>
          <div class="top">
              <div id=box_1>
                  <a><img src="http://t1.daumcdn.net/news/201010/19/ohmynews/20101019102109484.jpeg" alt="경기도 지도"  usemap="#관할구역 선택"/></a>
                  <map name="관할구역 선택">
                      <area shape="poly" coords="76,210,99,211,103,221,80,228" alt="안산" href="statusas.php" target="frame">
                      <area shape="poly" coords="70,137,115,147,120,143,90,157" alt="고양" href="statusgy.php" target="frame">
                      <area shape="poly" coords="144,126,177,120,188,156,150,163" alt="남양주" href="statusny.php" target="frame">
                      <area shape="poly" coords="130,193,156,187,162,200,140,210" alt="성남" href="statussn.php" target="frame">
                      <area shape="poly" coords="142,220,174,216,188,247,150,255" alt="용인" href="statusyi.php" target="frame">
                  </map>
              </div>
          </div>
      </section>
      </div>
    </div>
    <div class="item" style="white-space:nowrap; overflow:auto;  width:300px; height:500px; margin:0 auto;">
    <?php
$db='
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

$sql= "SELECT emp.empID, emp.empName, firestation.fsName, emp.dept, emp.Estatus FROM emp inner JOIN firestation ON emp.fsID = firestation.fsID WHERE emp.Estatus='O' AND firestation.areaName='yongin'";

$stat = oci_parse($con, $sql);
$ret = oci_execute($stat);
if(!$ret) {  // 오류라면 메시지 출력하고 종료
        echo "SQL문 오류"."<br>";
        exit();
}
echo "<h3>==용인시 출동현황==</h3>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>직원 ID</TH><TH>이름</TH><TH>안전센터</TH><TH>부서</TH><TH>출동현황</TH>";

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
oci_close($con);

?>
</div></div>
</article>
</div>
</body>
</html>
