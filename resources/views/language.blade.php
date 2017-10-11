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

    <title>Activisme_BE Crowdfund.</title>

    {{-- Gobal CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Template CSS --}}
    <link href="{{ asset('css/crowdfund.css') }}" rel="stylesheet">

    {{-- Fonts --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div style="padding-top: 70px;" class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-5 col-md-4">
                        <img style="width: 300px; height:400px;" src="{{ asset('img/logo.jpeg') }}" alt="Logo Activisme_BE" class="img-rounded text-center">
                    </div>
                    <div class="col-sm-7 col-md-6">
                        <h1><strong>Activisme_BE Crowdfund</strong></h1>
                        <p class="h2">Welcome. Bonjour. Hallo.</p>
                        <hr/>
                        <p>Gelieve uw taal te kiezen.<br> Choisissez votre langue s.v.p.<br> Please choose your language.</p>
                        <hr/>
                        <ul class="list-unstyled">
                            <li><a href="?lang=nl">Nederlands</a></li>
                            <li><a href="?lang=fr">Français</a></li>
                            <li><a href="?lang=en">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>