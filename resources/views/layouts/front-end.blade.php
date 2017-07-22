<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Een crowdfund voor de vredescaravan en de werking van ActivismeBE">
    <meta name="keywords" content="Activisme Crowdfund Armoede Caravan">
    <meta name="author" content="Activisme_BE">

    @stack('open-graph')    {{-- OpenGraph social media seo for facebook --}}
    @stack('twitter-cards') {{-- Twitter cards social media seo for Twitter --}}

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title')</title>

    <!-- Gobal CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Template CSS -->
    <link href="{{ asset('css/crowdfund.css') }}" rel="stylesheet">

    <!--Fonts-->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--header-->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="goal-summary pull-left">
                <div class="backers">
                    <h3>{{ $backers->count() }}</h3>
                    
                    @if ($backers->count() === 1)
                        <span>bijdrage</span>
                    @else
                        <span>bijdrages</span>
                    @endif
                </div>
                <div class="funded">
                    <h3>{{ $backers->sum('amount') }}€</h3>
                    <span>opgehaald van de {{ config('platform.needed-money') }}€</span>
                </div>
                <div class="time-left">
                    <h3>{{ $daysLeft }}</h3>
                    <span>dagen te gaan</span>
                </div>
                <div class="reminder last">
                    @if (Request::is('disclaimer*'))
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                    @else
                        <a href="{{ route('disclaimer.index') }}"><i class="fa fa-legal"></i> Disclaimer</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!--/header-->
<!--main content-->
<div class="main-content">
    <div class="container">
        @yield('content')
    </div>
</div>

@if (! Request::is('updates*'))
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!--This template has been created under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using this template in your own project, thank you.-->
                <span class="copyright">Alle rechten voorbehouden <a href="http://activisme.be" target="_blank">Activisme_BE</a></span>
            </div>
        </div>
    </footer>
@endif

<!-- Global jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Template JS -->
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
