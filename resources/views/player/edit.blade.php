@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('shared.errors')
            <div class="material-panel">
                <div class="material-panel__heading">Edit Player {{ $player->name }}</div>
                <div class="material-panel__body">
                    {!! Form::open(['method' => 'PUT', 'action' => ['PlayerController@update', $player->id], 'class' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name',$player->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slogan', 'Slogan') !!}
                        {!! Form::text('slogan', $player->slogan, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Edit Player', ['class' => 'material-btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
