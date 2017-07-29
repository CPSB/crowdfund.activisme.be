@extends('layouts.app')

@section('title', trans('page-title', ['name' => $user->first_name]))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h3>@lang('profile-settings.settings-title')</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#info" aria-controls="info" role="tab" data-toggle="tab">
                                    <span class="fa fa-user" aria-hidden="true"></span> @lang('profile-settings.nav-title-information')
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#security" aria-controls="security" role="tab" data-toggle="tab">
                                    <span class="fa fa-key" aria-hidden="true"></span> @lang('profile-settings.nav-title-security')
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="info"> {{-- Account information --}}
                                <div style="margin-top: 10px;" class="row nav-row-margin">
                                    <div class="col-md-12">
                                        {!! Form::open(['route' => ['settings.info'], 'class' => 'form-horizontal']) !!}
                                            <div class="form-group @if ($errors->has('name')) has-error @endif"> {{-- Name form group --}}
                                                <label class="control-label col-md-3">
                                                    @lang('profile-settings.label-name'): <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-md-9">
                                                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => trans('profile-settings.placeholder-name')]) !!}
                                                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                                </div>
                                            </div> {{-- /name form-group --}}

                                            <div class="form-group @if ($errors->has('email')) has-error @endif"> {{-- Email address form-group --}}
                                                <label class="control-label col-md-3">
                                                    @lang('profile-settings.label-email'): <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-md-9">
                                                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => trans('profile-settings.placeholder-email')]) !!}
                                                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                </div>
                                            </div> {{-- /Email address form-group --}}

                                            <div class="form-group"> {{-- form-actions --}}
                                                <div class="col-md-offset-3 col-md-9">
                                                    @include('shared._form_action')
                                                </div>
                                            </div> {{-- /Form actions --}}
                                        {!! Form::close() !!}    
                                    </div>
                                </div>
                            </div> {{-- /Account information --}}

                            <div role="tabpanel" class="tab-pane fade in" id="security"> {{-- /Account security --}}
                                <div style="margin-top: 10px;" class="row nav-row-margin">
                                    <div class="col-md-12">
                                        {!! Form::open(['route' => ['settings.security'], 'class' => 'form-horizontal']) !!}
                                            <div class="form-group @if ($errors->has('password')) has-error @endif"> {{-- Password form-group --}}
                                                <label class="control-label col-md-3">
                                                    @lang('profile-settings.label-password'): <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-md-9">
                                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('profile-settings.placeholder-password')]) !!}
                                                    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                                </div>
                                            </div> {{-- /Password form-group --}}

                                            <div class="form-group @if($errors->has('password_confirmation')) has-error @endif"> {{-- Password confirmation form-group --}}
                                                <label class="control-label col-md-3">
                                                    @lang('profile-settings.label-password-confirmation'): <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-md-9">
                                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('profile-settings.placeholder-password-confirmation')]) !!}
                                                    @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                                                </div>
                                            </div> {{-- /Password confirmation form-group --}}

                                            <div class="form-group"> {{-- form-actions --}}
                                                <div class="col-md-offset-3 col-md-9">
                                                    @include('shared._form_action')
                                                </div>
                                            </div> {{-- /Form actions --}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div> {{-- /Account security --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection