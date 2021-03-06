<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Basic Page Needs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>CSE135 Bakery - Menu</title>
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
        <link rel="stylesheet" href="./Skeleton-2.0.4/css/normalize.css">
        <link rel="stylesheet" href="./Skeleton-2.0.4/css/skeleton.css">
        <link rel="stylesheet" href="./assets/css/custom.css">

        <!-- Scripts
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
       <script>
            //pick 0 or 1 to cause a delay
            const cause_delay = Math.floor(Math.random()*2); 

            //set delay to be 0 by default
            let delay = 0;

            if(cause_delay)
            {
                //set random delay amount
                delay = Math.floor(Math.random()*2000);
            }
            //write a comment in the DOM, but delayed
            setTimeout(document.write(`<!-- we delayed you ${delay} miliseconds -->`),delay);
        </script>
 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- Favicon
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    </head>
    <body>

        <!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <div class="top-nav">
            <div class="container">
                <h1><a href="./" id="logo-button" onclick="registerClick('logo-button')">CSE135 Bakery</h1>
            </div>
        </div>

        <div class="section billboard" style="height: 8vw;">
            <div class="container">
                <div class="row">
                    <div class="one-half column">
                        <a class="button" href="./" id="back-button" onclick="registerClick('back-button')">Back</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="section menu">
            <div class="container">
                <h3>Menu</h3>
                <div class="row container-2">
                    <div class="one-half column menu-item picture" id="brownie">
                        <img class="u-max-full-width"  src="./assets/img/brownie-color.png" id="brownie-img">
                    </div>
                    <div class="one-half column menu-item">
                        <h5 class="value-heading">Fudge Brownie</h5>
                        <p class="value-description">Yep just a brownie.</p>
                        <p class="value-description pricetag" id="brownie-price">$2.50</p>
                        <a class="button" id="brownie-button" onclick="registerClick('brownie-button')">Order</a>
                    </div>
                </div>


                <div class="row container-2">
                    <div class="one-half column menu-item picture" id="cookie">
                        <img class="u-max-full-width"  src="./assets/img/cookies-color.png" id="cookie-img">
                    </div>
                    <div class="one-half column menu-item">
                        <h5 class="value-heading">Oatmeal Rasin Cookie</h5>
                        <p class="value-description">The cookie ya wanna track.</p>
                        <p class="value-description pricetag" id="cookie-price">$1.50</p>
                        <a class="button" id="cookie-button" onclick="registerClick('cookie-btn')">Order</a>
                    </div>
                </div>

                <div class="row container-2">

                    <div class="one-half column menu-item picture" id="muffin">
                        <img class="u-max-full-width"  src="./assets/img/muffin-color.png" id="muffin-img">
                    </div>

                    <div class="one-half column menu-item">
                        <h5 class="value-heading">Ice Cream Muffin</h5>
                        <p class="value-description">Did someone say ice cream.</p>
                        <p class="value-description pricetag" id="muffin-price">$3</p>
                        <a class="button" id="muffin-button" onclick="registerClick('muffin-button')">Order</a>
                    </div>
                </div>

                <div class="row container-2">

                    <div class="one-half column menu-item picture" id="bread">
                        <img class="u-max-full-width"  src="./assets/img/bread-color.png" id="bread-img">
                    </div>
                    <div class="one-half column menu-item">
                        <h5 class="value-heading">Banana Bread</h5>
                        <p class="value-description">Banana uwu na na.</p>
                        <p class="value-description pricetag" id="bread-price">$4</p>
                        <a class="button" id="bread-button" onclick="registerClick('bread-button')">Order</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="section pictures">
            <div class="container">
                <div class="one-half column value">
                    <img class="u-max-full-width"  src="./assets/img/topviewbread.jpg">
                </div>
                <div class="one-half column value">
                    <img class="u-max-full-width"  src="./assets/img/flour.jpg">
                </div>
            </div>
        </div>


        <div class="section footer" style="text-align: center;">
            <div class="container">
                <p>CSE135 Bakery - Made with &#10084;</p>
            </div>
        </div>




        <!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
    <script src="./collector.js"></script>
    <noscript id="js_disabled">
        <img src="/client?url=/menu&js_enabled=0" hidden>
        <!-- javascript has been disabled -->
    </noscript>
</html>
