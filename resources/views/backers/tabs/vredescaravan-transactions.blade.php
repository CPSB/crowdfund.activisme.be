@if ((int) count($vredesCaravan) > 0)
    <table class="table table-condensed table-hover table-striped">
        <thead>
            <th>#</th>
            <th>Uitvoerder:</th>
        </thead>
        <tbody>
            @foreach($vredesCaravan as $transactionCaravan) 
                <tr>
                    <td><strong><code> #T{{ $transactionCaravan->id }} </code></strong></td>
                    <td>{{ $transactionCaravan->uitvoerder }}</td>
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