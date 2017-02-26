@extends('layouts.app', ['page' => 'rip-page'])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="material-jumbotron">
                <h1><i class="fa fa-video-camera"></i> {{ $rip->title }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-12">
                <div class="rip">
                    <span class="rip__actions">
                        @if(!Auth::guest())
                            {!! Form::open(['method' => 'DELETE',
                                'action' => ['RipsController@destroy', $rip->id],
                                'class' => 'form inline-block'])
                                !!}
                                <button class="btn-unstyled" type="submit" name="button" title="Delete rip." onClick = "return confirm('Are you sure you want to delete this item?');"><i class="icon fa fa-trash-o"></i></button>
                                {!! Form::close() !!}
                                <a href="{{ action('RipsController@edit', $rip->id) }}" title="Edit rip."><i class="icon fa fa-edit"></i></a>
                            @endif
                        </span>
                    <div class="video-container">
                            <iframe width="100%" height="100%" src="{{ $rip->url }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <span class="rip__info">
                        <i class="fa fa-map-marker" title="Place of Death"></i> <span>{{ $rip->place }}</span>
                        <i class="fa fa-optin-monster" title="Enemy of Death"></i> <span>{{ $rip->enemy }}</span>
                        <i class="fa fa-bar-chart" title="Level of Stupidness"></i> <span>{{ $rip->level_of_stupidness }}</span>
                        </p><i class="fa fa-user"></i>
                        @foreach($rip->players as $player)
                            <a href="{{ action('PlayerController@show', $player->id) }}">{{ $player->name }}</a>
                            @if(!$loop->last)
                                <span>, </span>
                            @endif
                        @endforeach
                        </p>

                        <div class="input-group">
                            <input type="text" id="share-rip-url" class="form-control" value="{{ Request::url() }}">
                            <span class="input-group-addon">
                                <button data-clipboard-target="#share-rip-url" class="share-btn btn-unstyled" type="button" name="button" title="Copy to Clipboard.">
                                    <i class="fa fa-clipboard"></i>
                                </button>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" id="share-url" class="form-control" value="{{ $rip->url }}">
                            <span class="input-group-addon">
                                <button data-clipboard-target="#share-url" class="share-btn btn-unstyled" type="button" name="button" title="Copy to Clipboard.">
                                  <i class="fa fa-clipboard"></i>
                                </button>
                            </span>
                        </div>
                    </span>
                </div>
            </div>
    </div>
</div>
@endsection
