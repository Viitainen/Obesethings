@extends('layouts.app', ['page' => 'rip-page'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('shared.errors')
            <div class="material-panel material-panel--dark">
                <div class="material-panel__heading">Add New Rip</div>
                <div class="material-panel__body">
                    {!! Form::open(['action' => 'RipsController@store', 'class' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'Embed URL') !!}
                        {!! Form::text('url', 'https://www.youtube.com/embed/', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('place', 'Place of Death') !!}
                        {!! Form::text('place', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('enemy', 'Enemy of Death') !!}
                        {!! Form::text('enemy', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('level_of_stupidness', 'Level of Stupidness') !!}
                        {!! Form::selectRange('level_of_stupidness', 1, 10, 1, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('players[]', 'Players') !!}
                        {!! Form::select('players[]', $players, null, ['multiple' => true, 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Add Rip', ['class' => 'material-btn material-btn--dark']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
