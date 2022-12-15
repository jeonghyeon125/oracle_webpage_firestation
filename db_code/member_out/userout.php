<!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8">
  <title>관리자 | 회원 탈퇴</title>
 </head>
 <style>
        a{
        text-decoration : none; color : inherit;
        }

        h1{
            display:flex;
            justify-content: center;
        }
        form{
            padding:10px;
        }
        .input-box{
            position:relative;
            margin:10px 0;
        }
        .input-box > input{
            background:transparent;
            border:none;
            border-bottom: solid 1px #ccc;
            padding:20px 0px 5px 0px;
            font-size:14pt;
            width:100%;
        }
        input::placeholder{
            color:transparent;
        }

        input:focus + label, label{
            color:#8aa1a1;
            font-size:10pt;
            pointer-events: none;
            position: absolute;
            left:0px;
            top:0px;
            transition: all 0.2s ease ;
            -webkit-transition: all 0.2s ease;
            -moz-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
        }
        input[type=submit]{
            background-color: #8aa1a1;
            border:none;
            color:white;
            border-radius: 5px;
            width:100%;
            height:35px;
            font-size: 14pt;
            margin-top:100px;
        }

 </style>
 <script>
    function send(){
      document.form.action='empmain.php';
      document.form.submit();
      document.form.action='useroutac.php';
    }
    </script>
 <style>
 </style>
 <body>
  <header>
  <a href="http://software.hongik.ac.kr/a_team/a_team6/login.php"><h4>MAIN HOME</h4></a>
  </header>
<div>
<h1>회원 탈퇴 페이지</h1><br>
</div>


<form method="post" name="form" action="useroutac.php">
  <div class="input-box">
    <input type="text" id="empID" name="empID">
    <label for="empID">회원번호</label>
  </div>
  <div class="input-box">
    <input type="text" id="userName" name="userName">
    <label for="userName">이름</label>
  </div>
  <div class="input-box">
    <input type="text" id="userID" name="userID">
    <label for="userID">ID</label>
    </div>
  <div class="input-box">
    <input type="text" id="userPW" name="userPW">
    <label for="userPW">PW</label>
  </div>
  <input type="submit" value="탈퇴" onclick="send()"><br>
  </form>

</body>
</html>
