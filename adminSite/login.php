<?php
//ini_set('session.cookie_lifetime', 30 * 60);
//ini_set('session.gc_maxlifetime', 30 * 60);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Log In</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="./assets/Skeleton-2.0.4/css/normalize.css">
    <link rel="stylesheet" href="./assets/Skeleton-2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="./assets/css/custom.css">

    <!-- Scripts
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


    <!-- Favicon
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

</head>

<body>

    <!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="top-nav">
        <div class="container">
            <h1>Login</h1>
        </div>
    </div>

    <div class="section form">
        <div class="container">
            <div class="row">
                <div class="tewlve column login-form">
                    <form id="login-form" action="index" action="POST">
                        <div class="row">
                            <div class="twelve columns">
                                <label for="Username">Username</label>
                                <input class="u-full-width" name="username" placeholder="User" id="username-input">
                            </div>
                        </div>

                        <div class="row">
                            <div class="twelve columns">
                                <label for="Password">Password</label>
                                <input class="u-full-width" name="password" type="password" placeholder="Type in your password" id="password-input">
                            </div>
                        </div>

                        <label class="AdminDropdown">
                            <label for="admin-label">Log in as</label>
                            <select class="u-full-width" id="selectAdmin">
                                <option value="Admin-option">Admin</option>
                            </select>
                        </label>
                        <button class="button-primary" id="login-button" type="submit" value="Submit" formmethod="post" formaction='index'>Submit</button>
                    </form>

                    <!-- Always wrap checkbox and radio inputs in a label and use a <span class="label-body"> inside of it -->

                    <!-- Note: The class .u-full-width is just a utility class shorthand for width: 100% -->

                </div>
            </div>
        </div>
    </div>



</body>

<noscript id="js_disabled">
    <img src="/client?url=index.html&js_enabled=0" hidden>
    <!-- javascript has been disabled -->
</noscript>

</html> 