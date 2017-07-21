@if ((int) count($allTransactions) > 0)
    <table class="table table-hover table-striped table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Budget:</th>
                <th>Bedrag:</th>
                <th colspan="2">Titel</th> {{-- Colspan 2 needed for the functions. --}}
            </tr>
        </thead>
        <tbody>
            @foreach($allTransactions as $item)
                <tr>
                    <td><code>#T{{ $item->id }}</code></td>

                    <td>
                        @if ($item->finance_plan === 'vredescaravan')
                            <span class="label label-danger">Vredes caravan</span>
                        @elseif($item->finance_plan === 'activisme')
                            <span class="label label-success">Activisme</span>
                        @else
                            <span class="label label-primary">Onbekend</span>
                        @endif
                    </td>

                    <td>
                        @if ($item->type === 'inkomsten')
                            <span class="text-success">+ {{ number_format($item->amount) }}€</span>
                        @elseif($item->type === 'uitgaven')
                            <span class="text-danger">- {{ number_format($item->amount) }}€</span>
                        @endif
                    </td>

                    <td>{{ $item->titel }}</td>

                    <td class="pull-right"> {{-- Options --}}
                        <a href="{{ route('backers.transaction.show', $item) }}" class="btn btn-success btn-xs">
                            <span class="fa fa-info-circle" aria-hidden="true"></span> Info
                        </a>

                        <a href="{{ route('backers.transaction.destroy', $item) }}" class="btn btn-danger btn-xs">
                            <span class="fa fa-trash" aria-hidden="true"></span> Verwijder
                        </a>
                    </td> {{-- END options --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info alert-important">
        <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
        Er zijn geen transacties gevonden in het systeem.
    </div>
@endif