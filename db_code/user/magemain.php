<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/kit_code.js" crossorigin="anonymous">
    </script>
    <title>Nav Bar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
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

.idcheck{padding: 10px; text-align: center; font-size: large;}

.logout_button{ border: 2px solid #8aa1a1; background-color: white; color: black;}

#search {border: 2px solid #8aa1a1; background-color: white; color: black;}

.idcheck{padding: 10px; text-align: center; font-size: large;}

.layout{max-width: 100%; margin: 0 auto; padding: 20px; display: flex; flex-wrap: nowrap; gap: 1em;}

.submenu > li { line-height: 50px; background-color: #8aa1a1; text-align: center; padding: 15px 15px 0 0;}

li{list-style:none}

.submenu { height: 0; overflow: hidden;   text-align: center; padding: 0 15px;}

.navbar__menu > li:hover { background-color: #8aa1a1; transition-duration: 0.5s;}

.navbar__menu > li:hover .submenu {height: 200px; transition-duration: 1s;}

article{flex-basis: 680px; flex-grow: 1; flex-shrink: 1; background-color: white;}

.idcheck{ padding:10px; text-align:center; font-size:medium; font-weight:bold;}

@media screen and (max-width: 700px) {
.navbar {flex-direction: column; align-items: flex-start;margin: 0;}
.navbar__menu { flex-direction: column; align-items: center; width: 100%;}
.navbar__menu li { width: 100%; text-align: center; }
.navbar__icons {display: none; justify-content: center; width: 100%;}
}
  </style>

<body>
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
        echo "<script>alert('로그인이 필요합니다.\\n직원 로그인 후 관리자 로그인을 진행해주세요')</script>";
        echo "<script>location.href='login.php';</script>";
      }
    }
  ?>
  </div><br><br>

  <nav class="navbar">

    <div class="navbar__logo">
      <i class="fas fa-blog"></i>
      <a href="user_search.php">MAIN HOME</a>
    </div>

    <ul class="navbar__menu">
      <li>
        <a href="" target="frame">직원 DATA 관리</a>
        <ul class="submenu">
            <li><a href="emprefer.php">&nbsp;&nbsp;DATA 조회</a></li>
            <li><a href="empmandelpage.php">수정 및 삭제</a></li>
            <li><a href="empmanadd.php">추가</a></li>
        </ul>
      </li>
      <li>
        <a href="" target="frame">소방차량 DATA 관리</a>
        <ul class="submenu">
            <li><a href="firetruckrefer.php">조회</a></li>
            <li><a href="truckmandelpage.php">수정 및 삭제</a></li>
            <li><a href="truckmanadd.php">추가</a></li>
          </ul>
      </li>
      <li>
        <a href="" target="frame">일반회원 DATA 관리</a>
        <ul class="submenu">
            <li><a href="userrefer.php">조회</a></li>
            <li><a href="usermandelpage.php">수정 및 삭제</a></li>
            <li><a href="usermanadd.php">추가</a></li>
        </ul>
      </li>
      <li>
        <a href="" target="frame">동아리 DATA 관리</a>
        <ul class="submenu">
            <li><a href="clubrefer.php">조회</a></li>
            <li><a href="clubmandeladd.php">추가/변경/삭제</a></li>
            <li><a href="clubmanmember.php">동아리 회원 관리</a></li>
        </ul>
</li>
</ul>
<ul class="navbar__icons"></ul>
</nav>
<br><br>
<div class="layout">
<article>
<h2>경기도 119 안전센터 DATA</h2>
<hr><br><br>
<div class="flexbox">

</article>
</div>

</div>


</body>
</html>

