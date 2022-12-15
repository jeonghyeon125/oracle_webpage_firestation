<?php
session_start();
if(isset($_SESSION['adminCode'])){
    echo "<script>location.href='managemain.php';</script>";
}
?>

<html>
<head>
        <meta name="viewport" content="width=device-width, height=device-height, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
    <title>관리자 로그인</title>
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
    </style>
    <body>
            <header>
            <h1>관리자 로그인</h1><br><br>
        </header>

        <form action="admin_login_check.php" method="post">
            <div class="input-box">
                <input id="adminCode" type="adminCode" name="adminCode" placeholder="ADMIN CODE">
                <label for="adminCode">관리자 코드</label>
            </div>
            <input type="submit" value="ADMIN LOGIN"><br>
        </form>
</body>
</html>
