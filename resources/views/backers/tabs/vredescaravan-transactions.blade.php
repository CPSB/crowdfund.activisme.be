@if ((int) count($vredesCaravan) > 0)
    <table class="table table-condensed table-hover table-striped">
        <thead>
            <th>#</th>
            <th>Uitvoerder:</th>
            <th>Bedrag:</th>
            <th colspan="2">Reden:</th>  {{-- Colspan 2 nodig voor de functies. --}}
        </thead>
        <tbody>
            @foreach($vredesCaravan as $transactionCaravan) 
                <tr>
                    <td><strong><code> #T{{ $transactionCaravan->id }} </code></strong></td>
                    <td>{{ $transactionCaravan->uitvoerder }}</td>

                    <td>
                        @if ($transactionCaravan->type == 'uitgaven') 
                            <span class="text-danger">- {{ $transactionCaravan->amount }}€</span>
                        @else
                            <span class="text-success">+ {{ $transactionCaravan->amount }}€
                        @endif
                    </td>

                    <td></td>

                    <td class="pull-right"> {{-- Functions. --}}
                        <a href="{{ route('backers.transaction.show', $transactionCaravan) }}" class="btn btn-info btn-xs">
                            <span class="fa fa-info-circle" aria-hidden="true"></span> Info
                        </a>

                        <a href="{{ route('backers.transaction.destroy', $transactionCaravan) }}" class="btn btn-danger btn-xs">
                            <span class="fa fa-trash" aria-hidden="true"></span> Verwijder
                        </a>
                    </td> {{-- /Functions --}}
                <tr>
            @endforeach
        </tbody>
    </table>
@else 
    <div class="alert alert-info alert-important" role="alert">
        <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
        Er zijn geen transacties gevonden voor de vredescaravan.
    </div>
@endif