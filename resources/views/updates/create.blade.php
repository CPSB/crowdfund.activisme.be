@extends('layouts.app')

@section('title', 'Activisme_BE - Crowdfund updates')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-plus" aria-hidden="true"></span> Nieuwe update
                </div>

                <div class="panel-body">
                    <form method="post" action="{{ route('updates.store') }}" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Titel: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" placeholder="Update titel">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Status: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                    <option value="">-- Selecteer de status --</option>
                                    <option value="public">Publiceer</option>
                                    <option value="draft">Klad</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Update tekst: <span class="control-label">*</span>
                            </label>

                            <div class="col-md-9">
                                <textarea name="text" id="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Toevoegen
                                </button>

                                <button type="reset" class="btn btn-danger">
                                    <span class="fa fa-undo" aria-hidden="true"></span> Reset
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>

    <script>
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview']],
                ['height', ['height']]
            ]
        });
    </script>
@endpush
