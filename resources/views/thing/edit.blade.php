@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('shared.errors')
            <div class="material-panel">
                <div class="material-panel__heading">Edit Thing {{ $thing->title }}</div>
                <div class="material-panel__body">
                    {!! Form::open(['method' => 'PUT', 'action' => ['ThingController@update', $thing->id], 'class' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $thing->title, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'Youtube Embed URL') !!}
                        {!! Form::text('url', $thing->url, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('players[]', 'Players') !!}
                        {!! Form::select('players[]', $allPlayers, $players, ['multiple' => true, 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Edit Thing', ['class' => 'material-btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
