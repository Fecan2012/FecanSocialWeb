<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Welcome to C-link</title>
        <link href="css/index.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .auto-style1 {
                margin-left: 0px;
            }
            .auto-style2 {
                margin-left: 8px;
            }
        </style>
    </head>

    <body background="images/networking.jpg">
        <div class="headerMenu" style="height: 65px">
            <div id="wrapper">
                <div class="logo" style="width: 140px; height: 64px;">
                    &nbsp;<img src="images/logo.png"/><br />
                    <br />
                </div>
<!--                <div class="searchBox" style="left: 700px; top: 13px; width: 295px">
                    <form id="search">
                        <input type="text" name="searchB" size="60" placeholder="Search ..."/>
                    </form>
                </div>-->
            </div>
        </div>
        <label id="Label2"></label>
        <table style="width: 100%; ">
            <tr>
                <td style="width: 730px">
                    <form id="logIn" action="handle_login_form.php" method="post" style="width:400px; height: 354px;">
                        <label><br />
                            <br />
                            <br />
                            <br />
                            ALREADY REGISTERED USER</label>
                        <label> <br />
                            <br />
                            <input name="loginUserName" type="text" style="width: 279px; height: 27px;"  placeholder="Enter Email Address"class="auto-style2"/></label>
                        <label><br />
                            <br />
                            <input name="loginPassword" type="password" style="width: 279px; height: 27px;" size="20" class="auto-style1" placeholder="Enter Password"/></label>
                        <br />
                        <br />
                        <input type="submit" name="loginSubmit" value = "LOGIN" style="width: 180px; height: 33px"></form></td>
                <td>
                    <form id="signUp" action="handle_form.php" method="post" style=" width: 408px;"  >
                        <label id="Label3"><br />
                            <br />
                            <br />
                            CONNECT WITH FRIENDS</label><br />
                        <br />
                        <input name="userName" type="text" style="width: 280px; height: 27px;" placeholder="Centennial Email Add" /><br />
                        <br />
                        <input name="firstName" type="text" style="width: 280px; height: 27px;" placeholder="Enter First Name" /><br />
                        <br />
                        <input name="lastName" type="text" style="width: 280px; height: 27px;" placeholder="Enter Last Name"/><br />
                        <br />
                        <input name="password" type="password" style="width: 279px; height: 27px;" placeholder="Password" /><br />
                        <br />
                        <input name="confPassword" type="password" style="width: 280px; height: 27px;" placeholder="Confirm Password" /><br />
                        <br />
                        <input name="programName" type="text" style="width: 280px; height: 27px;" placeholder="Program Name"/><br />
                        <br />
                        <input name="campusName" type="text" style="width: 280px; height: 27px;" placeholder="Campus Name" /><br />
                        <br />
                        <input name="agreeCheckbox" type="checkbox" style="width: 21px" />
                        I have read and agree to 
                        the Terms of Service<br />
                        <br />
                        <input type="submit" name="submit" value="CONNECT" style="width: 180px; height: 33px"/></form>
                </td>
            </tr>
            <td style="width: 730px">
                <label><br />
                </label>
            </td>
            <br />
            <br />
        </table>
    </body>
</html>
