<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/kit_code.js" crossorigin="anonymous">
    </script>
    <title>경기 소방 관리</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    </script>
  </head>
  <style>

  :root {
  --text-color: black;
  --background-color: #8aa1a1;
  --accent-color: #99a7a7;
  --icons-color: rgb(152, 187, 201);}
h1{text-align: center;}
h2{text-align: center;}
body {margin: 0; background-color: var(--bodybackground-color); font-family: 'STIX Two Math';}

a {text-decoration: none; color: var(--text-color);}

.navbar {display: flex; justify-content: space-between; align-items: center; background-color: var(--background-color);
  padding: 8px 12px; font-family: 'STIX Two Math'; opacity: 0.7;}

.navbar__logo i { color: var(--accent-color); padding-left: 0;}

.navbar__menu {list-style: none; display: flex; margin: 5px; padding-left: 0;}

.navbar__menu li { padding: 8px 30px;}
.navbar a { color: rgb(32, 32, 32); font-weight: 700; font-size: 20px;}

.navbar__icons {list-style: none; display: flex; color: var(--icons-color); margin: 0; padding-left: 0;}

.navbar__icons li {padding: 8px 12px; margin: 0;}

.navbar__menu li:hover { background-color: var(--accent-color); border-radius: 3px;}
.outer-div {position: relative; width: 50%;}
hr {width : 80%; height : 3px; background-color : #8aa1a1; border : 0; margin: 0px auto;}
.idcheck{padding: 10px; text-align: center; font-size: large;}
.logout_button{ border: 2px solid #8aa1a1; background-color: white; color: black;}
#search {border: 2px solid #8aa1a1; background-color: white; color: black;}

.idcheck{padding: 10px; text-align: center; font-size: large;}
.layout{ max-width: 100%; margin: 0 auto; padding: 20px; display: flex; flex-wrap: nowrap; gap: 1em;}

article{flex-basis: 680px; flex-grow: 1; flex-shrink: 1; background-color: white;}
.flexbox{ display: flex; flex-wrap: wrap; gap: 1em; padding: 10px; background-color: white;}
.item{ min-height: 400px; flex-basis: 150px; flex-shrink: 1; flex-grow: 1; margin: 5px auto; background-color: white;}

.item1{
  background-image : url('https://cdn.safetynews.co.kr/news/photo/202210/216579_215628_820.jpg');
  background-size: contain;   background-repeat:no-repeat;   background-position:center center;}
  .item2{
  background-image : url('http://t1.daumcdn.net/news/201010/19/ohmynews/20101019102109484.jpeg');
  background-size: contain;   background-repeat:no-repeat;   background-position:center center;}
  .item3{
  background-image : url('https://www.nfa.go.kr/nfa/common/images/popup/banner_20220506_1.jpg');
  background-size: contain;   background-repeat:no-repeat;   background-position:center center;}



@media screen and (max-width: 700px) {
  .navbar { flex-direction: column; align-items: flex-start; margin: 0;}
  .navbar__menu { flex-direction: column; align-items: center;  width: 100%; }
  .navbar__menu li { width: 100%; text-align: center; }
  .navbar__icons { display: none; justify-content: center; width: 100%; }
}
</style>

<body>
  <button style = "float:right" id="search" onclick = "window.open('admin_login.php');">관리자 페이지</button>
  <form action="logout_check.php">
    <input type="submit" value="로그아웃" class="logout_button">
 </form>
  <header><br><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;경기도 소방서 관리</h1><br></header>
  <hr>

  <div class="idcheck">
  <?php
      session_start();
      // 세션 아이디 확인
      if(isset($_SESSION['userID'])){
          echo "<b>".$_SESSION['userID']."</b>";?><b>님 안녕하세요</b>
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
          <div class="item item1"></div>
          <div class="item item2"></div>
          <div class="item item3"></div>
        </article>
        </div>
      
        </div>
      
      
        </body>
        </html>
      
      
