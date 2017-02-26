@extends('layouts.app', ['page' => 'rip-page'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('shared.errors')
            <div class="material-panel material-panel--dark">
                <div class="material-panel__heading">Edit Rip {{ $rip->title }}</div>
                <div class="material-panel__body">
                    {!! Form::open(['method' => 'PUT', 'action' => ['RipsController@update', $rip->id], 'class' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $rip->title, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'Youtube Embed URL') !!}
                        {!! Form::text('url', $rip->url, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('place', 'Place of Death') !!}
                        {!! Form::text('place', $rip->place, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('enemy', 'Enemy of Death') !!}
                        {!! Form::text('enemy', $rip->enemy, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('level_of_stupidness', 'Level of Stupidness') !!}
                        {!! Form::selectRange('level_of_stupidness', 1, 10, $rip->level_of_stupidness, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('players[]', 'Players') !!}
                        {!! Form::select('players[]', $allPlayers, $players, ['multiple' => true, 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Edit rip', ['class' => 'material-btn material-btn--dark']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
