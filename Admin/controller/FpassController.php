<?php
include 'helper/FlashMessageHelper.php';
require 'controller/MainController.php';

if (isset($_GET['p'])) {
    if ($_GET['p'] == "fpass") {
        if (empty($_POST)) {
            include 'view/forgotpass.php';
            return;
        }
        $email = $_POST['email'];
        $checkemail = checkemail($email);
        if ($checkemail) {
            $name = $checkemail['name'];
            // generate a unique random token of length 100
            $token = bin2hex(random_bytes(50));
            // store token in the password-reset database table against the user's email
            $tokenStore = tokenForReset($email, $token);
            if ($tokenStore) {
                $subject = "$name, here's the link to reset your password";
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
                                        Reset your password, and we will get you on your way.<br>
                                        password, click the link below.</p>
                                </div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div style="mso-line-height-rule: exactly;line-height: 10px;font-size: 1px;">
                                    &nbsp;</div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div class="btn btn--flat btn--large" style="Margin-bottom: 20px;text-align: center;">
                                   <a  href="http://localhost/projects/GBICS/Admin/?p=new_password&token=' . $token . '" target="_blank"> <button style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #ffffff !important;background-color: #80bf2e;font-family: Ubuntu, sans-serif;"
                                      >Reset my password</button></a>
                                </div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div style="mso-line-height-rule: exactly;line-height: 10px;font-size: 1px;">
                                    &nbsp;</div>
                            </div>

                            <div style="Margin-left: 20px;Margin-right: 20px;">
                                <div style="mso-line-height-rule: exactly;mso-text-raise: 4px;">

                                    <p style="Margin-top: 0;Margin-bottom: 20px;"><em>This link will expire in
                                            24 hours, so be sure to use it right away.</em>
                                    </p>
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
                    $error['body'] = "We sent an email to <b>. $email .</b> to help you recover your account.";
                    $error['title'] = 'Success: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    include 'view/forgotpass.php';
                    return;
                } else {
                    $error['body'] = 'Error while sending email';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    include 'view/forgotpass.php';
                    return;
                }
            }
        } else {
            $error['body'] = 'Sorry, no user exists on our system with that email';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            include 'view/forgotpass.php';
            return;
        }
    }
}