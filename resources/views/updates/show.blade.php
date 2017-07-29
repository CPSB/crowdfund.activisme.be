@extends('layouts.front-end')

@section('title', $update->title)

@section('content')
<div class="row">
        <div class="content col-md-8 col-sm-12 col-xs-12">
            <div class="section-block">
                <div class="funding-meta">
                    <h1>Activisme_BE crowdfund</h1>
                    <span class="type-meta"><i class="fa fa-user"></i> {{ $update->author->name }} </span>
                    <span class="type-meta"><i class="fa fa-user"></i> Jonathan Doe</span>

                    @if (auth()->check() && $update->status == 'draft')
                        <span class="pull-right label label-danger"> Klad versie </span> 
                    @endifs

                    <img src="{{ asset('img/banner.jpg') }}" class="img-rounded img-responsive" alt="Activisme_BE Crowdfund">
                    
                    <h2>{{ $update->title }}</h2>
                    {!! $update->text !!}
                </div>
            </div>
        </div>
        {{--/main content--}}
        {{--sidebar--}}
        <div class="content col-md-4 col-sm-12 col-xs-12">
            <div class="section-block summary">
                <h1 class="section-title">SOCIAL MEDIA</h1>
                <div class="profile-contents">
                    {{--social links--}}
                    <ul class="list-inline">
                        <li><a href="{{ $share['twitter'] }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $share['facebook'] }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://github.com/CPSB/crowdfund.activisme.be" _target="blank"><i class="fa fa-github"></i></a></li>
                        <li><a href="mailto:tom@activisme.be"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{--/sidebar--}}
    </div>
@endsection