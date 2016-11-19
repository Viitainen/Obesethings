@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="material-jumbotron">
                <h1><i class="fa fa-video-camera"></i> {{ $thing->title }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-12">
                <div class="thing">
                    <span class="thing__actions">
                        @if(!Auth::guest())
                            {!! Form::open(['method' => 'DELETE',
                                'action' => ['ThingController@destroy', $thing->id],
                                'class' => 'form inline-block'])
                                !!}
                                <button class="btn-unstyled" type="submit" name="button" title="Delete thing." onClick = "return confirm('Are you sure you want to delete this item?');"><i class="icon fa fa-trash-o"></i></button>
                                {!! Form::close() !!}
                                <a href="{{ action('ThingController@edit', $thing->id) }}" title="Edit thing."><i class="icon fa fa-edit"></i></a>
                            @endif
                        </span>
                    <div class="video-container">
                            <iframe width="100%" height="100%" src="{{ $thing->url }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <span class="thing__info">
                        <i class="fa fa-user"></i>
                        @foreach($thing->players as $player)
                            <a href="{{ action('PlayerController@show', $player->id) }}">{{ $player->name }}</a>
                            @if(!$loop->last)
                                <span>, </span>
                            @endif
                        @endforeach

                        <div class="input-group">
                            <input type="text" id="share-thing-url" class="form-control" value="{{ Request::url() }}">
                            <span class="input-group-addon">
                                <button data-clipboard-target="#share-thing-url" class="share-btn btn-unstyled" type="button" name="button" title="Copy to Clipboard.">
                                    <i class="fa fa-clipboard"></i>
                                </button>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" id="share-url" class="form-control" value="{{ $thing->url }}">
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
