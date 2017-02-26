@extends('layouts.app', ['page' => 'rip-page'])

@section('content')
<div class="container rip-page">
    <div class="row">
        <div class="col-xs-12">
            <div class="material-jumbotron jumbo-poe-background">
                <h1>RIPS</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="filters col-xs-12">
                <div class="btn-group btn-block">
                    <a class="btn material-btn col-md-6" href="{{ action('RipsController@index', ['q' => 'latest'])}}">Latest</a>
                    <a class="btn material-btn col-md-6" href="{{ action('RipsController@index', ['q' => 'byplayer'])}}">By Player</a>
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
                        <p class="player__ripcount text-center">
                            <i class="fa fa-video-camera"></i> {{ $player->rips->count() }} clips
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($player->rips as $rip)
                    @if($loop->index >= 4)
                        @break
                    @endif
                    <div class="col-lg-6">
                        <div class="rip">
                            <h4>{{ $rip->title }}</h4>
                            <span class="rip__actions">
                                <a href="{{ action('RipsController@show', $rip->id) }}" title="Go to rip page."><i class="icon icon--red fa fa-eye"></i></a>
                                @if(!Auth::guest())
                                <a href="{{ action('RipsController@edit', $rip->id) }}" title="Edit rip."><i class="icon icon--red fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE',
                                        'action' => ['RipsController@destroy', $rip->id],
                                        'class' => 'form inline-block'])
                                        !!}
                                        <button title="Delete rip." class="btn-unstyled" type="submit" name="button" onClick = "return confirm('Are you sure you want to delete this item?');"><i class="icon icon--red fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                @endif
                            </span>
                            <div class="video-container">
                                    <iframe width="100%" height="100%" src="{{ $rip->url }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        @endforeach
    @endif
    @if(isset($rips) && $rips)
        <div class="row">
            <div class="rips">
                @foreach($rips as $rip)
                    <div class="col-lg-6">
                        <div class="rip">
                            <h4>{{ $rip->title }}</h4>
                            <span class="rip__actions">
                                <a href="{{ action('RipsController@show', $rip->id) }}" title="Go to rip page."><i class="icon icon--red fa fa-eye"></i></a>
                                @if(!Auth::guest())
                                <a href="{{ action('RipsController@edit', $rip->id) }}" title="Edit rip."><i class="icon icon--red fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE',
                                        'action' => ['RipsController@destroy', $rip->id],
                                        'class' => 'form inline-block'])
                                        !!}
                                        <button title="Delete rip." class="btn-unstyled" type="submit" name="button" onClick = "return confirm('Are you sure you want to delete this item?');"><i class="icon icon--red fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                @endif
                            </span>
                            <div class="video-container">
                                    <iframe width="100%" height="100%" src="{{ $rip->url }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <i class="fa fa-user"></i>
                            <span class="rip__info">
                                @foreach($rip->players as $player)
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
                {{ $rips->appends(['q' => 'latest'])->links() }}
            </div>
        </div>

    @endif
    </div>
@endsection
