@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="material-panel">
                <div class="material-panel__heading">Add New Thing</div>
                <div class="material-panel__body">
                    {!! Form::open(['action' => 'RegistrationkeysController@store', 'class' => 'form']) !!}
                    {!! Form::submit('Add Thing', ['class' => 'material-btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
