@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="material-jumbotron">
                <h1>JUST OBESETHINGS</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="filters col-xs-12">
                <div class="btn-group btn-block">
                    <a class="btn material-btn col-md-6" href="{{ action('ThingController@index', ['q' => 'latest'])}}">Latest</a>
                    <a class="btn material-btn col-md-6" href="{{ action('ThingController@index', ['q' => 'byplayer'])}}">By Player</a>
                </div>
            </div>
        </div>
    </div>
    @if(isset($players) && $players)
        @foreach ($players as $player)
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
                @foreach($player->things as $thing)
                    @if($loop->index >= 4)
                        @break
                    @endif
                    <div class="col-lg-6">
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
        @endforeach
    @endif
    @if(isset($things) && $things)
        <div class="row">
            <div class="things">
                @foreach($things as $thing)
                    <div class="col-lg-6">
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
                            <i class="fa fa-user"></i>
                            <span class="thing__info">
                                @foreach($thing->players as $player)
                                    <a href="{{ action('PlayerController@show', $player->id) }}">{{ $player->name }}</a>
                                    @if(!$loop->last)
                                        <span>, </span>
                                    @endif
                                @endforeach
                            </span>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="row">
            <div class="text-center center">
                {{ $things->appends(['q' => 'latest'])->links() }}
            </div>
        </div>

    @endif
    </div>
@endsection
