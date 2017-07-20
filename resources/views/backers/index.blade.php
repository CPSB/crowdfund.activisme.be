@extends('layouts.app')

@section('title', 'Financieel blad')

@section('content')
    <div class="row">
        <div class="col-md-9"> {{-- Content --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Transactie overzicht
                    <a href="" class="pull-right btn btn-xs btn-success">
                        <span class="fa fa-plus" aria-hidden="true"></span> Transactie toevoegen
                    </a>
                </div>

                <div class="panel-body">

                </div>
            </div>
        </div> {{-- /Content --}}

        <div class="col-md-3">
            <div class="list-group">
                <div class="list-group-item">
                    Totaal in kas: <span class="pull-right"><strong class="text-danger">0000€</strong></span>
                </div>
            </div>

            <div class="list-group">
                <a class="list-group-item">
                    <span class="fa fa-asterisk" aria-hidden="true"></span> Alle transacties
                </a>

                <a href="" class="list-group-item">
                    <span class="fa fa-asterisk" aria-hidden="true"></span> Transacties vredescaravan
                </a>

                <a href="" class="list-group-item">
                    <span class="fa fa-asterisk" aria-hidden="true"></span> Transacties Activisme
                </a>
            </div>
        </div>
    </div>
@endsection
