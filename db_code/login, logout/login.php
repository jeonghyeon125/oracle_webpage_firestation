<html>
<head>
    <meta name="viewport" content="width=device-width, height=device-height, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
    <title>직원 로그인</title>
</head>
<style>
  a {text-decoration-line: none;
  text-align: center;
  text-decoration: none; /* 링크의 밑줄 제거 */
  color: inherit; /* 링크의 색상 제거 */}
         header{
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
            input:placeholder-shown + label{
                color:#aaa;
                font-size:14pt;
                top:15px;

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

            input:focus, input:not(:placeholder-shown){
                border-bottom: solid 1px #8aa1a1;
                outline:none;
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
            #forgot{
                text-align: right;
                font-size:12pt;
                color:rgb(164, 164, 164);
                margin:10px 0px;
            }
</style>
<body>
    <header>
        <h1>MAIN PAGE</h1><br><br>
    </header>

        <form action="login_check.php" method="post">
            <div class="input-box">
                <input id="userID" type="text" name="userID" placeholder="ID">
                <label for="userID">아이디</label>
            </div>

            <div class="input-box">
                <input id="userPW" type="userPW" name="userPW" placeholder="PASSWORD">
                <label for="userPW">비밀번호</label>
            </div>
            <div id = "forgot"><a href="userout.php">탈퇴&nbsp;</a><a href="cr_ac.php">&nbsp;>회원가입</a></div>
            <input type="submit" value="LOGIN">

        </form>
</body>
</html>
