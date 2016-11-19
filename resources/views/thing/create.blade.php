@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('shared.errors')
            <div class="material-panel">
                <div class="material-panel__heading">Add New Thing</div>
                <div class="material-panel__body">
                    {!! Form::open(['action' => 'ThingController@store', 'class' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'Embed URL') !!}
                        {!! Form::text('url', 'https://www.youtube.com/embed/', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('players[]', 'Players') !!}
                        {!! Form::select('players[]', $players, null, ['multiple' => true, 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Add Thing', ['class' => 'material-btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
