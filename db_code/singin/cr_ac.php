<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<style>
    header{
        text-align: center;
    }
    nav{
        text-align: center;
    }
    table{
        margin: auto;
    }
    td{
        width : 100px;
        font-size:20px; text-shadow: 1px 1px 1px gray;
        text-align:center;
    }

    input{
        border : none;
        background-color: #D5D8DC;
        width : 365px; height : 30px;
    }
    a{
        text-decoration : none black;  color : inherit;
    }
    #tele1{
        width : 50px; height : 30px;
    }
    #tele2,#tele3{
        width : 150px; height : 30px;
    }
    .button{
        border:none;
        background-color : #8aa1a1;
        width : 600px; height : 40px;
        text-align: center; font-size: 20px;
        margin: 4px 2px;
    }
    @media only screen and (min-device-width : 320px) and (max-device-width:480px){
            header{
            text-align: center;
        }
        nav{
            text-align: center;
        }
        table{
            margin: auto;
        }
        td{
            width : 50px;
            font-size:20px; text-shadow: 1px 1px 1px gray;
            text-align:center;
        }
        input{
            border : none;
            background-color: #D5D8DC;
            width : 150px; height : 30px;
        }
       a{
            text-decoration : none black;  color : inherit;
       }
        #tele1{
            width : 50px; height : 30px;
        }
        #tele2,#tele3{
            width : 75px; height : 30px;
        }
        .button{
            border:none;
            background-color : #8aa1a1;
            width : 320px; height : 40px;
            text-align: center; font-size: 20px;
            margin: 4px 2px;
        }
        hr {
            width : 320px;
        }
        table {
            width : 320px;
        }
    }
</style>
<body>
   <header>
      <a href="http://software.hongik.ac.kr/a_team/a_team6/user_search.php"><h1>MAIN PAGE</h1></a>   </header>
   <nav>
        <h1 >Sign Up page</h1>
   </nav>

   <hr color ="#8aa1a1" width="650px" size="5px">

   <section>
       <br>
        <form action = "cr_ac_at.php" method="post">
            <table width="600" height = "650" >
                <tr>
                    <td><label for="name">이름</label></td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>

                <tr>
                    <td> <label for="id">아이디</label></td>
                    <td> <input type="text" name="id" id="id"></td>
                </tr>

                <tr>
                    <td><label for="tele1">전화번호</label></td>
                    <td>
                        <select name="tele1" id="tele1">
                            <option>010</option>
                            <option>012</option>
                            <option>013</option>
                        </select>

                        <input type="text" name="tele2" id="tele2" size="5">
                        <input type="text" name="tele3" id="tele3" size="5">
                    </td>
                </tr>
                <tr>
                    <td><label for="pw">비밀번호</label></td>
                    <td><input type="password" name="pw" id="pw"></td>
                </tr>

                <tr>
                    <td><label for="pw_check">비밀번호 확인</label></td>
                    <td><input type="password" name="pw_check" id="pw_check"></td>
                </tr>
                <tr>
                    <td colspan = "2" ><input type="submit" value="가입" name="join"class="button"></td>
                    <td></td>
                </tr>
            </table>

        </form>
    </section>
 
<?php

// oracle data base address
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


oci_close($con);

?>
</body>
</html>





