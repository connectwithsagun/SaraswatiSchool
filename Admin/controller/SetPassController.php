<?php
include 'helper/FlashMessageHelper.php';
require 'controller/MainController.php';

if (isset($_GET['p'])) {
    if ($_GET['p'] == "new_password") {
        $token = $_GET['token'];
        $getEmailForomPasswordReset = getEmail($token);
        if ($getEmailForomPasswordReset) {
            if (empty($_POST)) {
                include 'view/setpass.php';
                return;
            }

            $email = $getEmailForomPasswordReset['email'];
            $tokenID = $getEmailForomPasswordReset['resetID'];
            $password = $_POST['pass'];
            $cpassword = $_POST['cpass'];
            if ($password != $cpassword) {
                $error['body'] = 'Password didnot matched';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                include 'view/setpass.php';
                return;
            }
            $enpassword = sha1($password); //password encryption
            $setnewpass = setnewpass($email, $enpassword);
            if ($setnewpass) {
                $tokenExpired = setTokenNull($tokenID);
                $checkemail = checkemail($email);
                if ($checkemail) {
                    $name = $checkemail['gName'];
                    $subject = "$name, your password was successfully reset";
                    $msg = '<style type="text/css">
body {
    margin: 0;
    padding: 0;
}

< !--[if !mso]>< !--><style type="text/css">@import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic);
</style>
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic" rel="stylesheet"
    type="text/css" />
<!--<![endif]-->
<style type="text/css">
body {
    background-color: #f0f0f0
}

.logo a:hover,
.logo a:focus {
    color: #859bb1 !important
}

.mso .layout-has-border {
    border-top: 1px solid #bdbdbd;
    border-bottom: 1px solid #bdbdbd
}

.mso .layout-has-bottom-border {
    border-bottom: 1px solid #bdbdbd
}

.mso .border,
.ie .border {
    background-color: #bdbdbd
}

.mso h1,
.ie h1 {}

.mso h1,
.ie h1 {
    font-size: 36px !important;
    line-height: 43px !important
}

.mso h2,
.ie h2 {}

.mso h2,
.ie h2 {
    font-size: 22px !important;
    line-height: 31px !important
}

.mso h3,
.ie h3 {}

.mso h3,
.ie h3 {
    font-size: 18px !important;
    line-height: 26px !important
}

.mso .layout__inner,
.ie .layout__inner {}

.mso .footer__share-button p {}

.mso .footer__share-button p {
    font-family: Ubuntu, sans-serif
}
</style>
</head>
<table class="wrapper"
    style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #f0f0f0;"
    cellpadding="0" cellspacing="0" role="presentation">
    <tbody>
        <tr>
            <td>
                <div class="layout one-col fixed-width"
                    style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                    <div class="layout__inner"
                        style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;"
                        emb-background-style>

                        <div class="column"
                            style="text-align: left;color: #787778;font-size: 16px;line-height: 24px;font-family: Ubuntu,sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">

                            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
                                <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 1px;">
                                    &nbsp;</div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div style="mso-line-height-rule: exactly;mso-text-raise: 4px;">
                                    <h1
                                        style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #565656;font-size: 30px;line-height: 38px;text-align: center;">
                                        <strong>Hi ' . $name . '</strong></h1>
                                    <p style="Margin-top: 20px;Margin-bottom: 0;">&nbsp;<br />
                                        You have successfully changed your password.</p>
                                </div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div style="mso-line-height-rule: exactly;line-height: 10px;font-size: 1px;">
                                    &nbsp;</div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div style="mso-line-height-rule: exactly;mso-text-raise: 4px;">

                                    <p style="Margin-top: 20px;Margin-bottom: 20px;">
                                        Thank you for visiting Hotel Alpha!<br>The Hotel Alpha Team
                                    </p>



                                </div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
                                <div style="mso-line-height-rule: exactly;line-height: 5px;font-size: 1px;">
                                    &nbsp;</div>
                            </div>

                        </div>

                    </div>
                </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>

</body>

</html>';
//   $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
                    $msg = wordwrap($msg, 70);
                    if (sendmail($email, $token, $subject, $msg)) {
                        $error['body'] = "password reset successfully you can login now";
                        $error['title'] = 'Success: ';
                        $error['type'] = 'success';
                        setFlash('message', $error);
                        header('location: ?p=login');
                        return;
                    } else {
                        $error['body'] = 'Password Changed but Error while sending email';
                        $error['title'] = 'Info: ';
                        $error['type'] = 'danger';
                        setFlash('message', $error);
                        header('location: ?p=login');
                        return;
                    }
                }

            } else {
                $error['body'] = 'Password cannot reset successfully';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                include 'view/setpass.php';
                return;
            }
        } else {
            $error['body'] = 'Token Expired';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header('location: ?p=fpass');
            return;
        }
    }
}