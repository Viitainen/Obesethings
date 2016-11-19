@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('shared.errors')
            <div class="material-panel">
                <div class="material-panel__heading">Add Player</div>
                <div class="material-panel__body">
                    {!! Form::open(['action' => 'PlayerController@store', 'class' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name','', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slogan', 'Slogan') !!}
                        {!! Form::text('slogan', '', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Add Player', ['class' => 'material-btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
