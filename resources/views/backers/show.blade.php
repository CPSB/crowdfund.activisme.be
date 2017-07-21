@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9"> {{-- Content --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><code>#T{{ $transaction->id }}:</code></strong> {{ ucfirst($transaction->titel) }}
                    <div class="pull-right">{{ $transaction->created_at }}</div>
                </div>
                <div class="panel-body"> {{-- Transaction data --}}
                    <div class="row">
                        <div class="col-md-3"><strong>Op naam van:</strong></div> 
                        <div class="col-md-3">{{ $transaction->uitvoerder }}</div>

                        <div class="col-md-3"><strong>Ingevoegd door:</strong></div>
                        <div class="col-md-3">{{ $transaction->creator->name }}</div>

                        <div class="col-md-3"><strong>Type transactie:</strong></div>
                        <div class="col-md-3">
                            @if ($transaction->status == 'uitgaven')
                                <span class="label label-danger">Uitgaven</div> 
                            @else
                                <span class="label label-success">Inkomsten</span>
                            @endif
                        </div>

                        <div class="col-md-3"><strong>Budgetering:</strong></div>
                        <div class="col-md-3">{{ ucfirst($transaction->finance_plan) }}</div>
                    </div>
                </div>
            </div>

            @if (! is_null($transaction->extra_informatie)) {{-- Extra information block --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-info-circle" aria-hidden="true"></span> Extra informatie omtrent de transactie.
                    </div>

                    <div class="panel-body">{{ $transaction->extra_informatie }}</div>
                </div>
            @endif {{-- END extra ionformation block --}}
        </div> {{-- END Content --}}

        <div class="col-md-3"> {{-- Sidebar --}} 
            <div class="list-group">
                <a href="{{ route('backers.transaction.delete', $transaction) }}" class="list-group-item list-group-item-danger">
                    <span class="fa fa-trash" aria-hidden="true"></span> Verwijder transactie.
                </a>
            </div>
        </div> {{-- END sidebar --}}
    </div>
@endsection