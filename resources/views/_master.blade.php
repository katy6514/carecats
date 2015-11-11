<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Yield the title if it exists, otherwise default to 'Developers Toolbox' -->
    <title>@yield('title','C.A.R.E. Big Cat Rescue')</title>

    <!-- Maybe meta tags and css links belong in @head to be yielded? -->
    <meta http-equiv="content-language" content="en-US"/>
    <meta name="keywords" content="" />
    <meta name="creator" content=""/>
    <meta name="description" content=""/>
    <meta name="subject" content=""/>

    <link rel='stylesheet' href='/css/normalize.css' type='text/css'>
    <link rel='stylesheet' href='/css/main.css' type='text/css'>
    <link rel='stylesheet' href='/css/responsive.css' type='text/css'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Theme -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet">
    <!-- Yield any page specific CSS files or anything else you might want in the <head> -->
    @yield('head')
</head>
<body>
    <div class="wrapper container">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">CARE</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Meet the Animals <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Bobcats</a></li>
                                <li><a href="#">Cougars</a></li>
                                <li><a href="#">Leopards</a></li>
                                <li><a href="#">Lions</a></li>
                                <li><a href="#">Tigers</a></li>
                                <li><a href="#">House Meows</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Coatis</a></li>
                                <li><a href="#">Lemurs</a></li>
                                <li><a href="#">Llamas</a></li>
                                <li class="divider"></li>
                                <li><a href="#">In Memory</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">About CARE</a></li>
                                <li><a href="#">Meet the People</a></li>
                                <li><a href="#">Appreciation</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Press</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Programs <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Internships</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Partnerships and Fundraisers</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Help CARE <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Donate</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Volunteer</a></li>
                                <li><a href="#">Adopt or Sponsor</a></li>
                                <li><a href="#">CARE Shop</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">News</a></li>
                                <li><a href="#">Newsletter Archive</a></li>
                                <li><a href="#">Newsletter Signup</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Tours</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::get('flash_message'))
        	<div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif

        <header>
            @yield('header')
        </header>

        <main>
            <!-- Main page content will be yielded here -->
            @yield('content')
        </main>
        <div class="push"></div>
    </div> <!-- close wrapper div -->
    <footer>

        <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <div class="social-links-bottom">
            <ul>
                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
            </ul>
        </div>
            &copy; {{ date('Y') }}
        <!-- @yield('footer') -->
    </footer>

    <!-- Yield any page specific JS files or anything else you might want at the end of the body -->
    <!-- @yield('body') -->


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @yield('scripts')
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>


</body>
</html>
