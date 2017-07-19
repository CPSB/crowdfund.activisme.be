@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ asset('img/front.jpg') }}">
        </div>
    </div>

    @if (session()->get('class') && session()->get('message'))
        <div style="padding-top: 15px;" class="row">
            <div class="col-md-12">
                <div class="{{ session()->get('class') }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
    @endif

    <div style="padding-top: 15px;" class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">Application barebone.</div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <p>© {{ date('Y') }} - ActivismeBE</p>
                </div>

                <div class="col-md-6 col-sm-8">
                    <ul class="bottom_ul">
                        <li><a href="http://www.activisme.be">ActivismeBE</a></li>
                        <li><a href="https://www.vrede.be/">Vrede.be</a></li>
                        <li><a href="https://stopnato2017.org/">StopNATO2017</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
