@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="material-jumbotron">
                <h1 class="uppercase"><i class="fa fa-user"></i> {{ $player->name }} Things</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="player">
                <div class="player__slash">
                </div>
                <h3 class="player__name text-center"><a href="{{ action('PlayerController@show', $player->id) }}">{{ $player->name }}</a></h3>
                <p class="q player__slogan text-center">
                    {{ $player->slogan }}
                </p>
                <p class="player__thingcount text-center">
                    <i class="fa fa-video-camera"></i> {{ $player->things->count() }} clips
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="player__things">
            @foreach($player->things as $thing)
                <div class="col-md-6">
                    <div class="thing">
                        <h4>{{ $thing->title }}</h4>
                        <span class="thing__actions">
                            <a href="{{ action('ThingController@show', $thing->id) }}" title="Go to thing page."><i class="icon icon--green fa fa-eye"></i></a>
                            @if(!Auth::guest())
                            <a href="{{ action('ThingController@edit', $thing->id) }}" title="Edit thing."><i class="icon icon--green fa fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE',
                                    'action' => ['ThingController@destroy', $thing->id],
                                    'class' => 'form inline-block'])
                                    !!}
                                    <button title="Delete thing." class="btn-unstyled" type="submit" name="button" onClick = "return confirm('Are you sure you want to delete this item?');"><i class="icon icon--green fa fa-trash-o"></i></button>
                                {!! Form::close() !!}
                            @endif
                        </span>
                        <div class="video-container">
                            <iframe width="100%" height="100%" src="{{ $thing->url }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
