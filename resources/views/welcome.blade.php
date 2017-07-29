@extends('layouts.front-end')

@section('title', 'Activisme_BE crowdfund')

@push('twitter-cards')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Activisme_be" />
    <meta name="twitter:title" content="Activisme_BE Crowdfund voor de werking en Vredes caravan." />
    <meta name="twitter:description" content="Met ons klein team dat opkomt voor wereldvrede en de rechten van de mens, gebruiken we deze website, activisme.be, als uitvalsbasis.
                        Activisme.be wil een platform bieden om mensen en organisaties samen te brengen en vanuit een verenigd front te.." />
    <meta name="twitter:image" content="{{ asset('img/banner.jpg') }}" />
@endpush

@push('open-graph')
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title" content="Activisme_BE Crowdfund voor de werking en Vredes caravan." />
    <meta property="og:image" content="{{ asset('img/banner.jpg') }}" />
    <meta property="og:description" content="Met ons klein team dat opkomt voor wereldvrede en de rechten van de mens, gebruiken we deze website, activisme.be, als uitvalsbasis.
                        Activisme.be wil een platform bieden om mensen en organisaties samen te brengen en vanuit een verenigd front te..">
    <meta property='article:publisher' content='https://www.facebook.com/ActivismeBE' />
@endpush

@section('content')
    <div class="row">
        <div class="content col-md-8 col-sm-12 col-xs-12">
            <div class="section-block">
                <div class="funding-meta">
                    <h1>Activisme_BE crowdfund</h1>
                    <img src="{{ asset('img/banner.jpg') }}" class="img-rounded img-responsive" alt="Activisme_BE Crowdfund">

                    <h2>Activisme_BE werking</h2>

                    <p>
                        Met ons klein team dat opkomt voor wereldvrede en de rechten van de mens, gebruiken we deze website, activisme.be, als uitvalsbasis. 
                        Activisme.be wil een platform bieden om mensen en organisaties samen te brengen en vanuit een verenigd front te strijden voor onze belangen die nu maar al te vaak op de helling worden gezet.
                        Naast zichtbare aanwezigheid op tal van demonstraties, parades en betogingen, organiseren wij zelf ook straatacties en ludieke (protest)acties.
                        De website activisme.be is de plaats bij uitstek waar we ruchtbaarheid kunnen geven aan deze acties, betogingen en demonstraties.
                    </p>
                    <p>
                        Daarnaast leggen we via activisme.be online petities en petitielijsten aan, die wijds kunnen uitgestuurd worden naar onze achterban. 
                        Andere organisaties en bewegingen kunnen gratis gebruik maken van dit platform om petities voor de goede zaak op te stellen en te verspreiden.
                    </p>
                    <p>
                        Om dit alles draaiende te houden, de website up to date te houden, de petities op te stellen en de deur uit te krijgen, hebben we jullie hulp nodig. 
                        Aangezien we zonder enige subsidie of overheidssteun werken, is elke gift, hoe klein ook, welkom. 
                        Deze giften zullen integraal gebruikt worden om ons webteam te ondersteunen, zodat activisme.be langzaam aan kan uitgroeien tot een platform dat gebruikt kan worden om het beleid,
                        de politici en iedereen die meewerkt aan een samenleving waar steeds meer mensen naar de marge worden verwezen, op het matje en tot verantwoording te roepen.
                    </p>

                    <h2>Vredes caravan</h2>

                    <p>
                        Recent hebben we een oude caravan aangekocht, die gebruikt zal worden om verscheidene acties mee te doen, zoals kledij, dekens,
                        soep en voeding te gaan bedelen over het hele land aan de minderbedeelden en daklozen. Daar we de caravan voor verschillende doeleinden zullen gebruiken, 
                        zal het interieur ook volledig moeten aangepast worden, zodat deze uit mobiele eenheden bestaan, die gemakkelijk te verplaatsen zijn, volgens het doel dat we uitvoeren. 
                        Aangezien we zonder enige subsidie of overheidssteun werken, is elke gift welkom. Het rekeningnummer om ons vrijblijvend te steunen:
                    </p>

                    <h2>Steun ons:</h2>

                    <p>
                        Het rekeningnummer om ons vrijblijvend te steunen: <br>
                        Belfius <br>
                        IBAN: BE42 0636 1795 9854 <br>
                        BIC: GKCC BE BB <br>
                        Met vermelding: Ik steun activisme.be of Ik steun de vredescaravan
                    </p>

                    <h2>{{ $backers->sum('amount') }}€</h2>
                    <span class="contribution">
                        opgehaald door <strong>{{ $backers->count() }}</strong>

                        @if ($backers->count() === 1)
                            persoon
                        @else
                            <span>personen</span>
                        @endif
                    </span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="{{ config('platform.needed-money') }}" style="width: {{ $percent }}%;">
                            <span class="sr-only">{{ number_format($percent, 2)}}% Compleet</span>
                        </div>
                    </div>
                    <span class="goal-progress">
                        <strong>{{ number_format($percent, 2)}}%</strong> opgehaald van de {{ config('platform.needed-money') }}€
                    </span>
                </div>
                <span class="count-down"><strong>{{ $daysLeft }}</strong>dagen te gaan.</span>
            </div>
            
            <div class="section-block">
                <div class="section-tabs">
                    <div class="update-information">
                        <h1 class="section-title">UPDATES</h1>
                        {{-- update items --}}
                            @if ((int) count($updates) > 0)
                                @foreach($updates as $update)
                                    <div class="update-post">
                                        <h4 class="update-title">{{ $update->title }}</h4>
                                        <span class="update-date">{{ $update->created_at->diffForHumans() }}</span>
                                        <p>
                                            {!! str_limit(strip_tags($update->text), 200, '... <a href="">Lees meer</a>') !!}
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info alert-important">
                                    <strong><span class="fa fa-info-circle"></span> Info:</strong>
                                    Er zijn geen updates voor onze crowdfund.
                                </div>
                            @endif
                        {{-- /update items --}}
                    </div>
                </div>
            </div>
        </div> {{-- /main content --}}
        <div class="content col-md-4 col-sm-12 col-xs-12"> {{--sidebar--}}
            <div class="section-block summary">
                <h1 class="section-title">SOCIAL MEDIA</h1>
                <div class="profile-contents">
                    <ul class="list-inline"> {{--social links --}}
                        <li><a href="{{ $share['twitter'] }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $share['facebook'] }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://github.com/CPSB/crowdfund.activisme.be" _target="blank"><i class="fa fa-github"></i></a></li>
                        <li><a href="mailto:tom@activisme.be"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>{{--/sidebar--}}
    </div>
@endsection
