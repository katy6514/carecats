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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Theme -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet">


    <!-- Side menu style -->
    <link rel='stylesheet' href='/css/menu.css' type='text/css'>
    <link rel='stylesheet' href='/css/main.css' type='text/css'>
    <link rel='stylesheet' href='/css/responsive.css' type='text/css'>
    <!-- Modernizr -->
    <script src="{{ URL::asset('js/modernizr.js') }}"></script>

    <!-- Yield any page specific CSS files or anything else you might want in the <head> -->
    @yield('head')

</head>
<body>
    <div class="wrapper container">

        @if(Session::get('flash_message'))
        	<div class='flash-message'>{{ Session::get('flash_message') }}<button id="hide-flash">dismiss</button></div>
        @endif

        <header>
        <!-- @yield('header') -->
            <a id="cd-logo" href="/">The Center for Animal Research and Education</a>
    		<nav id="cd-top-nav">
                <ul>
                    @if(Auth::check())
                        <li><a href='/'>Home</a></li>
                        <!-- <li><a href='/books/create'>Add a book</a></li> -->
                        <li><a href='/logout'>Log out</a></li>
                    @else
                        <li><a href='/'>Home</a></li>
                        <li><a href='/login'>Log in</a></li>
                        <li><a href='/register'>Register</a></li>
                    @endif
                </ul>
    		</nav>
    		<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span></a>
        </header>

        <div class="cd-main-content">
            <main>
                <!-- Main page content will be yielded here -->
                @yield('page_title')
                @yield('content')
            </main>
        </div>

        <nav id="cd-lateral-nav">
    		<ul class="cd-navigation">
    			<li class="item-has-children">
    				<a href="#0" class="mm_item">Meet the Animals</a>
    				<ul class="sub-menu">
                        <li><a href="/animals/bobcat">Bobcats</a></li>
                        <li><a href="/animals/cougar">Cougars</a></li>
                        <li><a href="/animals/leopard">Leopards</a></li>
                        <li><a href="/animals/lion">Lions</a></li>
                        <li><a href="/animals/tiger">Tigers</a></li>
                        <li><a href="#">House Meows</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Coatis</a></li>
                        <li><a href="#">Lemurs</a></li>
                        <li><a href="#">Llamas</a></li>
                        <li class="divider"></li>
                        <li><a href="#">In Memory</a></li>
    				</ul>
    			</li> <!-- item-has-children -->

    			<li class="item-has-children">
    				<a href="#0" class="mm_item">About</a>
    				<ul class="sub-menu">
                        <li><a href="#">About CARE</a></li>
                        <li><a href="#">Meet the People</a></li>
                        <li><a href="#">Appreciation</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Press</a></li>
    				</ul>
    			</li> <!-- item-has-children -->

    			<li class="item-has-children">
    				<a href="#0" class="mm_item">Programs</a>
    				<ul class="sub-menu">
                        <li><a href="#">Internships</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Partnerships &amp; Fundraisers</a></li>
    				</ul>
    			</li> <!-- item-has-children -->

    			<li class="item-has-children">
    				<a href="#0" class="mm_item">Help CARE</a>
    				<ul class="sub-menu">
                        <li><a href="#">Donate</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Volunteer</a></li>
                        <li><a href="#">Adopt or Sponsor</a></li>
                        <li><a href="#">CARE Shop</a></li>
    				</ul>
    			</li> <!-- item-has-children -->

    			<li class="item-has-children">
    				<a href="#0" class="mm_item">News</a>
    				<ul class="sub-menu">
                        <li><a href="#">News</a></li>
                        <li><a href="#">Newsletter Archive</a></li>
                        <li><a href="#">Newsletter Signup</a></li>
    				</ul>
    			</li> <!-- item-has-children -->
    		</ul> <!-- cd-navigation -->

    		<ul class="cd-navigation cd-single-item-wrapper">
    			<li><a href="#0">Tour</a></li>
    			<li><a href="#0">Gallery</a></li>
    			<li><a href="#0">Contact</a></li>
    		</ul> <!-- cd-single-item-wrapper -->

            <!-- &copy; {{ date('Y') }} -->
    	</nav>

        <div class="push"></div>
    </div> <!-- close container/wrapper div -->

    <footer>
        <div class="section group"><!-- footer_content  -->
        	<div class="col span_1_of_4">
                <h3>Contact</h3>
                <p>Center For Animal Research and Education</p>
                <p>245 County Road 3422</p>
                <p>Bridgeport, TX 76426</p>
                <p>940-683-8115</p>
        	</div>
        	<div class="col span_1_of_4 right">
                <h3>Learn More</h3>
                <a href="#">News</a><br />
                <a href="#">Newsletter Archive</a><br />
                <a href="#">Newsletter Signup</a><br />
        	</div>
        	<div class="col span_1_of_4 right">
                <h3>Support</h3>
                <a href="#">Donate</a><br />
                <a href="#">Wish List</a><br />
                <a href="#">Volunteer</a><br />
                <a href="#">Adopt or Sponsor</a><br />
                <a href="#">CARE Shop</a><br />
        	</div>
        	<div class="col span_1_of_4 right">
                <h3>Participate</h3>
                <a href="#">Visit</a><br />
                <a href="#">Volunteer</a><br />
                <a href="#">Internships</a><br />
                <a href="#">Careers</a><br />
                <a href="#">Partnerships</a><br />

        	</div>
        </div>
        <div class="section group">
            <div class="col span_4_of_4">
                <div id="social-links">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
                    </ul>
                </div>


                <form id="site-search" class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </footer>


    <!-- Yield any page specific JS files or anything else you might want at the end of the body -->
    <!-- @yield('scripts') -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script>
        $(document).ready(function(){
            $("#hide-flash").click(function(){
                $(".flash-message").hide();
            });
        });
        </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- <script src="{{public_path()}}/js/plugins.js"></script> -->
    <script src="{{ URL::asset('js/plugins.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>


</body>
</html>
