<?php
    include_once 'cus/tap_printer.php';
    include_once 'cus/bottle_printer.php';
    include_once 'cus/menuPrinter.php';
    include_once 'cus/pressprinter.php';
    include_once 'cus/eventprinter.php';
?>
<!DOCTYPE html>

<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width" />

    <title>The Anthill Pub &amp; Grille</title>

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" href="foundation/stylesheets/foundation.css">
    <link rel="stylesheet" href="foundation/stylesheets/app.css">

    <script src="foundation/javascripts/modernizr.foundation.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Exo:800,900' rel='stylesheet' type='text/css'>
</head>

<body>

<span id="nav-logo"><a href="#front-page"><img src="img/anthillpub-navlogo.png" /></a></span>

<div id="front-page" data-magellan-destination="top">
    <div class="row">
        <div class="twelve columns">
            <img id="logo" src="img/anthillpub-logo.png" />
        </div>
    </div>
    <div class="row">
        <div class="eight columns offset-by-four">
            <h4 class="front-page-header">If you've seen a commercial for it, we don't have it</h4>
        </div>
    </div>
    <div id="front-page-details" class="hide-for-small">
        <p id="address">UC Irvine C215 Student Center<br/><a href="http://goo.gl/maps/Wkf9S" title="See us on the map!">4200 Campus Drive, Irvine, CA 92614</a><br/>(949) 824-3050</p>
        <p id="hours">M-W: 11am-Midnight &bull; Th-F: 11am-1am &bull; Sat: 7pm-1am<br/>Happy Hour M-F: 4pm-7pm</p>
    </div>
    <div id="nav-menu" class="hide-for-small">
        <ul class="nav-right hide-for-small" data-magellan-expedition="fixed">
            <li data-magellan-arrival="top" class="li-center"></li>
            <li data-magellan-arrival="find-us" class="li-center"><a href="#find-us">FIND US</a></li>
            <li><img src="img/anthillpub-navdivider-black.png" class="nav-divider" /></li>
            <li data-magellan-arrival="events" class="li-center"><a href="#events">EVENTS</a></li>
            <li><img src="img/anthillpub-navdivider-black.png" class="nav-divider" /></li>
            <li data-magellan-arrival="menu" class="li-center"><a href="#menu">MENU</a></li>
            <li><img src="img/anthillpub-navdivider-black.png" class="nav-divider" /></li>
            <li data-magellan-arrival="beer" class="li-center"><a href="#beer">BEER</a></li>
            <li><img src="img/anthillpub-navdivider-black.png" class="nav-divider" /></li>
            <li data-magellan-arrival="about-us" class="li-center"><a href="#about-us">ABOUT US</a></li>
        </ul>
    </div>    
</div>

<div id="about-us" data-magellan-destination="about-us">
    <div class="row" id="about-us-row">
        <div class="six columns">
            <h3>ABOUT US</h3>
            <p>
                We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. 
            </p>
            <p>
                We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. We serve beer. 
            </p>
        </div>
        <div class="six columns hide-for-small">
            <div id="press-slider">
                <?php
                    $press = new PressPrinter();

                    $press->printPress();
                ?>

                <!--<div class="press-slide">
                    <h3>NEWS</h3>
                    <h4>Newspaper 1</h4>
                    <div class="inner-slide-div">
                        <p>
                            This newspaper thinks we are super awesome. They wrote about our event on this one day.
                        </p>
                        <ul class="button-group even two-up">
                            <li><a class="alert button" href="#">View Article</a></li>
                            <li><a class="alert button" data-reveal-id="press-reveal-1">View Screenshot</a></li>
                        </ul>
                    </div>
                </div>
                <div class="press-slide">
                    <h3>NEWS</h3>
                    <h4>Newspaper 2</h4>
                    <div class="inner-slide-div">
                        <p>
                            This newspaper also thinks we are super awesome. They also wrote about our event on this one day.
                        </p>
                        <ul class="button-group even two-up">
                            <li><a class="alert button" href="#">View Article</a></li>
                            <li><a class="alert button" data-reveal-id="press-reveal-1">View Screenshot</a></li>
                        </ul>
                    </div>
                </div>
                <div class="press-slide">
                    <h3>NEWS</h3>
                    <h4>Newspaper 3</h4>
                    <div class="inner-slide-div">
                        <p>
                            This newspaper thinks we are super awesome, too. They wrote about our event on this one day, too.
                        </p>
                        <ul class="button-group even two-up">
                            <li><a class="alert button" href="#">View Article</a></li>
                            <li><a class="alert button" data-reveal-id="press-reveal-1">View Screenshot</a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>

<div id="beer" data-magellan-destination="beer">
    <div class="row">
        <div class="twelve columns">
            <h3>BEER</h3>
            <ul class="accordion">
                <li class="active">
                    <div class="title">
                        <h4>On Tap</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <?php
                                $tap_printer = new tap_printer();
                                $tap_printer->getTaps();
                                $tap_printer->printTapsForFront();
                            ?>
                            
                        </div>
                    </div>
                </li>
                <li>
                    <div class="title">
                        <h4>Bottled</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <?php
                                $bottledBeer = new bottle_printer();
                                $bottledBeer->countRows(2);
                                $bottledBeer->getBottles(2);

                                $bottledBeer->printBottlesForFront();
                            ?>

                            <!--<div class="six columns">
                                <ul id="wine-column1">
                                    <li>Bottled Beer 1</li>
                                    <li>Bottled Beer 2</li>
                                    <li>Bottled Beer 3</li>
                                    <li>Bottled Beer 4</li>
                                    <li>Bottled Beer 5</li>
                                </ul>    
                            </div>
                            <div class="six columns">
                                <ul id="wine-column2">
                                    <li>Bottled Beer 6</li>
                                    <li>Bottled Beer 7</li>
                                    <li>Bottled Beer 8</li>
                                    <li>Bottled Beer 9</li>
                                    <li>Bottled Beer 10</li>
                                </ul>    
                            </div>-->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="title">
                        <h4>Wine</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                           <?php
                                $bottledWine = new bottle_printer();
                                $bottledWine->countRows(3);
                                $bottledWine->getBottles(3);
                                $bottledWine->printBottlesForFront();
                            ?>
                            <!--<div class="six columns">
                                <ul id="wine-column1">
                                    <li>Wine 1</li>
                                    <li>Wine 2</li>
                                    <li>Wine 3</li>
                                    <li>Wine 4</li>
                                    <li>Wine 5</li>
                                </ul>    
                            </div>
                            <div class="six columns">
                                <ul id="wine-column2">
                                    <li>Wine 6</li>
                                    <li>Wine 7</li>
                                    <li>Wine 8</li>
                                    <li>Wine 9</li>
                                    <li>Wine 10</li>
                                </ul>    
                            </div>-->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="menu" data-magellan-destination="menu">
    <div class="row">
        <div class="twelve columns">
            <h3>MENU</h3>
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <?php
                $menuprinter = new MenuPrinter();

                $menuprinter->printFirstColumnTypes(4);
                $menuprinter->printFirstColumnTypes(5);
                $menuprinter->printFirstColumnTypes(10);
            ?>
            <!--<h4>Appetizers</h4> 
            <ul id="appetizers">
                <li>
                    <p class="menu-item">Hummus &amp; Pita</p>
                    <p class="menu-description">Hummus w/ warmed pita wedges and celery sticks</p>
                </li>
                <li>
                    <p class="menu-item">Tortilla Chips</p>
                    <p class="menu-description">Seasoned house tortilla chips and salsa</p>
                </li>
                <li>
                    <p class="menu-item">French Fries</p>
                </li>
                <li>
                    <p class="menu-item">Tater Tots</p>
                </li>
                <li>
                    <p class="menu-item">Curly Fries</p>
                    <p class="menu-description">Includes ranch dipping sauce</p>
                </li>
                <li>
                    <p class="menu-item">Sweet Potato Fries</p>
                    <p class="menu-description">Includes chipotle ranch dipping sauce</p>
                </li>
                <li>
                    <p class="menu-item">Cheese Quesadilla</p>
                    <p class="menu-description">Includes our house salsa</p>
                </li>
                <li>
                    <p class="menu-item">Chicken Quesadilla</p>
                </li>
                <li>
                    <p class="menu-item">Fire Ants</p>
                    <p class="menu-description">
                        8oz. breaded popcorn chicken, deep fried and tossed in our own chipotle-habanero hot sauce, served w/ celery sticks and blue cheese dipping sauce
                    </p>
                </li>
                <li>
                    <p class="menu-item">Chili Fries</p>
                    <p class="menu-description">French fries w/ chili and cheddar cheese</p>
                </li>
            </ul>-->
            <!--<h4>Salads &amp; Soup</h4>       
            <ul id="salads-and-soup">
                <li>
                    <p class="menu-item">Salad of the Week</p>
                    <p class="menu-description">Add chicken option</p>
                </li>
                <li>
                    <p class="menu-item">Soup of the Day</p>
                    <p class="menu-description">Add cornbread option</p>
                </li>
                <li>
                    <p class="menu-item">Vegetarian Chili</p>
                    <p class="menu-description">8 oz. bowl served w/ cornbread</p>
                </li>
            </ul>-->
            <!--<h4>Drinks</h4>
            <ul id="drinks">
                <li>
                    <p class="menu-item">Fountain Drinks</p>
                    <p class="menu-description">24oz. w/ one refill; Pepsi, Diet Pepsi, Sierra Mist, Root Beer, Orange, or Lemonade)</p>
                </li>
                <li>
                    <p class="menu-item">Aquafina Water</p>
                    <p class="menu-description">20oz.</p>
                </li>
                <li>
                    <p class="menu-item">Dole 100% Juice</p>
                    <p class="menu-description">Orange or Kiwi Strawberry</p>
                </li>
                <li>
                    <p class="menu-item">Lipton Iced Tea</p>
                    <p class="menu-description">Unsweetened, sweetened, or sweetened w/ lemon</p>
                </li>
                <li>
                    <p class="menu-item">Sobe Green Tea</p>
                </li>
                <li>
                    <p class="menu-item">Sobe No Fear Energy Drink</p>
                </li>
            </ul>-->
        </div>
        <div class="six columns">
            <?php
                $menuprinter->printFromTheGrille();
                $menuprinter->printSandwiches();
            ?>

            <!--<h4 class="section-with-description">From the Grille</h4> 
            <p class="menu-description">All entrees served with chips and pickle spear unless otherwise noted.</p>
            <ul id="from-the-grille">
                <li>
                    <p class="menu-item">Build Your Own Burger</p>
                    <p class="menu-description">All burgers served w/ lettuce, tomato, onion, and mayo</p>
                    <ul id="burger-options">
                        <li>1/4 lb. Angus Beef Burger</li>
                        <li>1/4 lb. Garden Burger</li>
                        <li>1/4 lb. Grilled Chicken Breast</li>
                        <li>1/3 lb. Turkey Breast</li>
                        <li>1/3 lb. Hand-pressed Beef Burger</li>
                        <li id="burger-addons-li">
                            <p class="menu-item">Add-ons</p>
                            <ul id="burger-addons">
                                <li>
                                    Cheese
                                    <p class="menu-description">Cheddar, pepper jack, provolone, swiss</p>
                                </li>
                                <li>Blue Cheese Crumbles</li>
                                <li>Grilled Onions</li>
                                <li>Grilled Peppers &amp; Onions</li>
                                <li>Guacamole</li>
                                <li>Avocado</li>
                                <li>Bacon</li>
                                <li>Chili</li>
                                <li>Thousand Island</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <p class="menu-item">Sausage of the Week</p>
                    <p class="menu-description">Mad Mike's and Jody Maroni sausages</p>
                </li>
                <li>
                    <p class="menu-item">Street Tacos</p>
                    <p class="menu-description">
                        Two tri-tip tacos with chopped onions, cilantro, and spicy jalape&ntilde;o salsa on corn tortillas
                    </p>
                </li>
                <li>
                    <p class="menu-item">Pesto Chicken Sandwich</p>
                    <p class="menu-description">With provolone on a kaiser roll</p>
                </li>
                <li>
                    <p class="menu-item">Spicy Barbecue Chicken Sandwich</p>
                    <p class="menu-description">Grilled chicken w/ cheddar, bacon, chipotle barbecue sauce, and guacamole</p>
                </li>
                <li>
                    <p class="menu-item">Philly</p>
                    <p class="menu-description">Grilled steak on hoagie roll w/ provolone and grilled peppers &amp; onions</p>
                </li>
                <li>
                    <p class="menu-item">Salmon BLT</p>
                    <p class="menu-description">w/ smoked bacon &amp; lemon caper aioli</p>
                </li>
            </ul>-->
            <!--<h4 class="section-with-description">Sandwiches</h4>
            <p class="menu-description">All sandwiches served with deli chips and pickle spear.</p>       
            <ul id="sandwiches">
                <li>
                    <p class="menu-item">Grilled Cheese</p>
                    <p class="menu-description">On sourdough; options to add tomato and/or turkey</p>
                </li>
                <li>
                    <p class="menu-item">BLT</p>
                    <p class="menu-description">On wheat; option to add avocado</p>
                </li>
                <li>
                    <p class="menu-item">BBQ Pulled Pork</p>
                    <p class="menu-description">On kaiser roll</p>
                </li>
                <li>
                    <p class="menu-item">Patty Melt</p>
                    <p class="menu-description">On rye w/ cheddar, grilled onions, and thousand island</p>
                </li>
                <li>
                    <p class="menu-item">Smoked Turkey Breast</p>
                    <p class="menu-description">
                        w/ lettuce, tomato, mayo, and mustard; bread options: sourdough, rye, or wheat; cheese options: cheddar, pepper jack, provolone, or swiss
                    </p>
                </li>
                <li>
                    <p class="menu-item">BBQ Tri Tip Sandwich</p>
                    <p class="menu-description">Grilled sliced tri tip on a hoagie roll w/ barbecue sauce</p>
                </li>
            </ul>-->
        </div>
    </div>
    <div class="row">
        <div class="twelve columns">
            <p class="menu-info">KITCHEN OPEN 11am-9pm</p>
            <p class="menu-info">CASH ONLY</p>
        </div>      
    </div>
</div>

<div id="events" data-magellan-destination="events">
    <div id="events-row" class="row">
        <div class="eight columns offset-by-four">
            <h3>EVENTS</h3>
            <?php
                $event = new EventPrinter();

                $event->printEvent();

            ?>
            <!--<div class="event-container">
                <p class="date">
                    <span class="event-date">3/2/2013</span>
                    <br/>
                    <span class="event-time">8:00pm</span>
                </p>
                <p class="event">
                    <span class="event-title">Website Tutorials</span>
                    <br/>
                    <span class="event-description">Learn how to make websites at the best place for such an activity - the Pub!</span>
                </p>
            </div>
            <div class="event-container">
                <p class="date">
                    <span class="event-date">3/5/2013</span>
                    <br/>
                    <span class="event-time">7:00pm</span>
                </p>
                <p class="event">
                    <span class="event-title">Free Dinner</span>
                    <br/>
                    <span class="event-description">Come eat food served the best way - for free!</span>
                </p>
            </div>
            <div class="event-container">
                <p class="date">
                    <span class="event-date">4/20/2013</span>
                    <br/>
                    <span class="event-time">4:20pm</span>
                </p>
                <p class="event">
                    <span class="event-title">Botany 101</span>
                    <br/>
                    <span class="event-description">Learn about plants on a totally irrelevant day!</span>
                </p>
            </div>
            <div class="event-container">
                <p class="date">
                    <span class="event-date">5/5/2013-5/6/2013</span>
                    <br/>
                    <span class="event-time">9:00pm-11:00am</span>
                </p>
                <p class="event">
                    <span class="event-title">Cindo de Mayo Fun Fest</span>
                    <br/>
                    <span class="event-description">It's taco time! We're having this fiesta leading into the next morning!</span>
                </p>
            </div>-->
        </div>
    </div>
</div>

<div id="find-us" data-magellan-destination="find-us">
    <div class="row" id="find-us-row">
        <div id="contact-info" class="six columns">
            <h3>FIND US</h3>
            <p class="address">UCI C215 Student Center<br/>4200 Campus Dr.<br/>Irvine, CA 92614<br/>(949) 824-3050</p>
            <p class="bullet">&bull;</p>
            <p class="hours"><span class="days">Monday-Wednesday</span><br/>11:00am-Midnight</p>
            <p class="hours"><span class="days">Thursday-Friday</span><br/>11:00am-1:00am</p>
            <p class="hours"><span class="days">Saturday</span><br/>7:00pm-1:00am</p>
            <p class="happy-hour hours">
                <span class="happy-hour-label">Happy Hour</span><br/><span class="days">Monday-Friday</span><br/>3:00pm-7:00pm
            </p>
            <p class="social-divider">-----</p>
            <p class="social-label">Be social with us!</p>
            <p class="social-icons">
                <a class="facebook-icon" href="http://www.facebook.com/pages/Anthill-Pub-Grille/8562876692?fref=ts" title="Like us on Facebook!">
                    <img src="img/facebook-icon.png" />
                </a>
                <a class="twitter-icon" href="https://twitter.com/Anthill_Pub" title="Follow us on Twitter!">
                    <img src="img/twitter-icon.png" />
                </a>
            </p>
        </div>
        <div id="map" class="six columns hide-for-small">
            <iframe width="425" height="475" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Anthill+Pub+%26+Grille&amp;hl=en&amp;cid=6110646653961186939&amp;gl=US&amp;hq=Anthill+Pub+%26+Grille&amp;t=h&amp;ie=UTF8&amp;hnear=&amp;ll=33.655174,-117.84236&amp;spn=0.016968,0.018282&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q=Anthill+Pub+%26+Grille&amp;hl=en&amp;cid=6110646653961186939&amp;gl=US&amp;hq=Anthill+Pub+%26+Grille&amp;t=h&amp;ie=UTF8&amp;hnear=&amp;ll=33.655174,-117.84236&amp;spn=0.016968,0.018282&amp;z=15&amp;iwloc=A&amp;source=embed" style="color:#D80000;text-align:left;font-size:12px;">View Larger Map</a></small>
        </div>
        <p class="find-us-mobile-map-link show-for-small"><a href="http://goo.gl/maps/Wkf9S">View us on the map!</a></p>
    </div>
</div>

<?php
    $press->pressReveals();
?>

<!--<div id="press-reveal-1" class="reveal-modal">
    <img src="img/flagmap.jpg" />
    <a class="close-reveal-modal">&#215;</a>
</div>
<div id="press-reveal-2" class="reveal-modal">
    <img src="img/flagmap.jpg" />
    <a class="close-reveal-modal">&#215;</a>
</div>
<div id="press-reveal-3" class="reveal-modal">
    <img src="img/flagmap.jpg" />
    <a class="close-reveal-modal">&#215;</a>
</div>-->

<script src="foundation/javascripts/jquery.js"></script>

<script src="foundation/javascripts/foundation.min.js"></script>
<script src="foundation/javascripts/app.js"></script>

<script src="js/jquery.smooth-scroll.js"></script>
<script src="js/jquery.animate-colors-min.js"></script>
<script src="js/jquery.touchwipe.min.js"></script>

<script>
    $(document).ready(function() {
        $('ul.nav-right a').smoothScroll();
        $('#nav-logo a').smoothScroll();

        var topOfOthDiv = $("#about-us").offset().top - 79;
        $(window).scroll(function() {
            if($(window).scrollTop() > topOfOthDiv) { //scrolled past the other div?
                if ($(window).width() > 767) {
                    $("#nav-logo").fadeIn(150); //reached the desired point -- show div
                }
                $('.nav-right').css("margin-top",".85%");
                $('.nav-right').css("border-bottom","solid 8px #b4b0b0");
                $('#nav-menu').css("border-top","0");
                $('.nav-right').css("background","black");
            } else {
                if ($(window).width() > 767) {
                    $("#nav-logo").fadeOut(150); // hide when we scroll back up
                }
                $('.nav-right').css("margin-top","0");
                $('.nav-right').css("border-bottom","0");
                $('#nav-menu').css("border-top","solid 8px #b4b0b0");
            }
        });
    });

    $(window).resize(function() {
        if ($(window).width() < 767) {
            $("#events").css("background","#461312");
        } else {
            $("#events").css("background","url(img/anthillpub-events-sidephotos.jpg) no-repeat 10% 75px #461312");
            $("#events").css("background-size","25% 100%");
        }
    });


    $(window).load(function() {
        $('#press-slider').orbit({ 
            advanceSpeed: 6000, 
            captionAnimation: 'slideOpen', 
            resetTimerOnClick: true,
            fluid: '16x14',
            bullets: true
        });

        if ($(window).width() < 767) {
            $("#events").css("background","#461312");
        }
    });

    $(document).foundationTabs({deep_linking: false});

    $(function () {
        var $slideshow_container = $('#press-slider'); 

        $slideshow_container.touchwipe({ 
            wipeLeft: function() { 
                $slideshow_container.trigger("orbit.next"); 
            }, 
            wipeRight: function() { 
                $slideshow_container.trigger("orbit.prev");
            } 
        }); 
    });
</script>

</body>
</html>