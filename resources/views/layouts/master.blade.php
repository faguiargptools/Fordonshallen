<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Fordonshallen | Adblue inaktivering | Motoroptimering | Verkstadstjänster</title>
        <meta name="author" content="Johnny Molander">

        <!-- fonts -->
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="/css/bootstrap.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="/css/general.css">
    </head>
    <body class="@yield('bodyClass')">
    <div class="container main_container header p20" style="position: relative;">
        <div class="navbar navbar-default">
            <div class="container pnone">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse pnone">
                    <ul class="nav navbar-nav">
                        <li class="@yield('hem')">
                            <a href="/">Hem</a>
                        </li>
                        <li class="@yield('nyheter')">
                            <a href="/nyheter">Nyheter</a>
                        </li>
                        <li class="dropdown @yield('adblue-inaktivering')">
                            <a href="/adblue-inaktivering">
                                Adblue Inaktivering
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/vad-ar-adblue">Vad är AdBlue?</a>
                                </li>
                            </ul>
                        </li>
                        <li class="@yield('egr-system-inaktivering')">
                            <a href="/egr-system-inaktivering">EGR-System Inaktivering</a>
                        </li>
                        <li class="dropdown @yield('motoroptimering')">
                            <a href="/motoroptimering">
                                Motoroptimering
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/villkor-garanti">Villkor & Garanti</a>
                                </li>
                            </ul>
                        </li>
                        <li class="@yield('faq')">
                            <a href="/faq">FAQ</a>
                        </li>
                        <li class="dropdown @yield('om-oss')">
                            <a href="/om-oss">
                                Om oss
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/forsaljningsvillkor">Försäljningsvillkor</a>
                                </li>
                                <li>
                                    <a href="/kontaktinformation">Kontaktinformation</a>
                                </li>
                            </ul>
                        </li>
                        <li class="@yield('butik')">
                            <a href="#">Butik</a>
                        </li>
                    </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
        <img src="/img/header.png"><!-- invisible image for div size -->
        <div class="visitkort">
            <h4 class="text-center">Fordonshallens Verkstadstjänster</h4>
            <hr class="hr-lite" style="border-color: #999; width: 80%; margin: auto;" />
            <p><span class="text-left"><i class="fa fa-phone-square"></i> 08-519 720 72</span> <span class="pull-right"><i class="fa fa-mobile-phone"></i> 070-416 61 00</span> </p>
        </div>
    </div>

    <div class="container content">
        @yield('content')
    </div>

    <div class="container">
        <footer class="text-center">
            <span>Copyright © Fordonshallen 2015 | Er försäljare och montör av AdBlue enheter av högsta kvalitet |</span><br />
            <span>Tel: 08-519 720 72 och 070-41 66 100| Adress Kalmarvägen 3, 746 31 Bålsta | Org.nummer: 969667-2105</span>
        </footer>
    </div>

    @yield('javascript')

    </body>
</html>