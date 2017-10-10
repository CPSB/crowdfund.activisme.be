@extends('layouts.app')

@section('title', 'Financieel blad')

@section('content')
    <div class="row">
        <div class="col-md-9"> {{-- Content --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Transactie overzicht
                    <a href="{{ route('backers.transaction.create') }}" class="pull-right btn btn-xs btn-success">
                        <span class="fa fa-plus" aria-hidden="true"></span> Transactie toevoegen
                    </a>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="all">
                            @include('backers.tabs.all-transactions')
                        </div>

                        <div role="tabpanel" class="tab-pane fade in" id="vredescaravan">
                            @include('backers.tabs.vredescaravan-transactions')
                        </div>

                        <div role="tabpanel" class="tab-pane fade in" id="activisme">
                            @include('backers.tabs.activisme-transactions')                       
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- /Content --}}

        <div class="col-md-3">
            <div class="list-group">
                <div class="list-group-item">
                    @php($total = $income - $outcome)
                    Totaal in kas:
                    <span class="pull-right">
                        <strong class="@if ($total < 0) text-danger @else text-success @endif">{{ $total }}€</strong>
                    </span>
                </div>
            </div>

            <div class="list-group">
                <a class="list-group-item" href="#all" aria-controls="all" role="tab" data-toggle="tab">
                    <span class="fa fa-asterisk" aria-hidden="true"></span> Alle transacties
                </a>

                <a class="list-group-item" href="#vredescaravan" aria-controls="vredescaravan" role="tab" data-toggle="tab">
                    <span class="fa fa-asterisk" aria-hidden="true"></span> Transacties vredescaravan
                </a>

                <a class="list-group-item" href="#activisme" aria-controls="activisme" role="tab" data-toggle="tab">
                    <span class="fa fa-asterisk" aria-hidden="true"></span> Transacties Activisme
                </a>
            </div>
        </div>
    </div>
@endsection
