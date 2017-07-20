@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-money" aria-hidden="true"></span> Nieuwe transactie.
                </div>
                
                <div class="panel-body">
                    <form method="post" action="" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                Transactie type: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <select name="type" class="form-control">
                                    <option value="">-- Selecteer transactie type --</option>
                                    <option value="inkomsten">Inkomsten</option>
                                    <option value="uitgaven">Uitgaven</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Bestemming: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <select name="finance_plan" class="form-control">
                                    <option value="">-- Selecteer transactie bestemming --</option>
                                    <option value="vredescaravan">Vredescaravan</option>
                                    <option value="activisme">Activisme werking</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                Uitgevoerd door: <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="uitvoerder" placeholder="Uitvoerder zijn naam.">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                Bedrag: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="amount" placeholder="Bedrag van de transactie.">
                                <small class="help-block">* Euro word er automatisch door het systeem achter gezet.</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                Extra informatie:
                            </label>

                            <div class="col-md-9">
                                <textarea name="extra_informatie" rows="7" class="form-control" placeholder="Extra informatie omtrent de transactie."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Insturen
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