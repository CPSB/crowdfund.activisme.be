@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-file-text-o"></span> Updates
                    <a href="{{ route('updates.create') }}" class="pull-right btn btn-xs btn-default">Nieuwe update</a>
                </div>

                <div class="panel-body">
                    @if ((int) count($updates) === 0)
                        <div class="alert alert-info alert-important" role="alert">
                            <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
                            Er zijn nog geen updates voor de crowdfund.
                        </div>
                    @else
                        <table class="table table-condensed table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Autheur</th>
                                    <th>Status</th>
                                    <th colspan="2">Titel</th> {{-- Colspan 2 needed for the functions. --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($updates as $update)
                                    <tr>
                                        <td><strong>#{{ $update->id }}</strong></td>
                                        <td>{{ $update->author->name }}</td>

                                        <td>
                                            @if ($update->status === 'public')
                                                <span class="label label-success">Gepubliceerd</span>
                                            @elseif ($update->status === 'draft')
                                                <span class="label label-warning">Klad versie</span>
                                            @endif
                                        </td>

                                        <td>{{ $update->title }}</td>

                                        <td class="pull-right">
                                            <a href="" class="btn btn-xs btn-info">Bekijken</a>
                                            <a href="{{ route('updates.edit', $update) }}" class="btn btn-xs btn-warning">Wijzig</a>
                                            <a href="{{ route('updates.destroy', $update) }}" class="btn btn-xs btn-danger">Verwijder</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
