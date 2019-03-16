<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Basic Page Needs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>CSE135 Bakery</title>
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
                <h1>CSE135 Bakery</h1>
            </div>
        </div>

        <div class="section billboard">
            <div class="container">
                <div class="row">
                    <div class="one-half column">
                        <h4 class="hero-heading">Let's get this artisan bread.</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="one-half column">
                        <a class="button" href="/menu" id="menu-button" onclick="registerClick('menu-button')">View Menu</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="section intro">
            <div class="container">
                <h3>We are...</h3>
                <div class="row">
                    <div class="one-third column value">
                        <h4 class="value-multiplier">Local</h4>
                        <h5 class="value-heading">Made in San Diego</h5>
                        <p class="value-description">Yes our bread tastes like sunshine and vacation.</p>
                    </div>
                    <div class="one-third column value">
                        <h4 class="value-multiplier">Fresh</h4>
                        <h5 class="value-heading">Made in small batch</h5>
                        <p class="value-description">What taste better than freshly made bread??</p>
                    </div>
                    <div class="one-third column value">
                        <h4 class="value-multiplier">Ethical </h4>
                        <h5 class="value-heading">Fair wage for all</h5>
                        <p class="value-description">We pay fairly for labor.</p>
                    </div>
                </div>
                <a class="button" id="learnmore-button" onclick="registerClick('learnmore-button')" onhover="learnMoreFunction()">Learn More</a>
            </div>
        </div>

        <div class="section deliver">
            <div class="container">
                <h3 class="section-heading">We Cater!</h3>

                <div class="row">

                    <div class="one-half column value">
                        <p class="section-description">Just give us a call at 858-900-0135.</p>
                        <p>Our catering services is dope.</p>
                    </div>
                    <div class="one-half column value">
                        <img class="u-max-full-width"  src="./assets/img/freedelivery.png">
                    </div>
                </div>
            </div>

        </div>

        <div class="section satisfaction">
            <div class="container">
                <h3 class="section-heading">Customer Satisfaction</h3>
                <p class="section-description">we really out here trying you know. UWU</p>
                <div class="row">
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
        <img src="/client?url=index&js_enabled=0" hidden>
        <!-- javascript has been disabled -->
    </noscript>
</html>
