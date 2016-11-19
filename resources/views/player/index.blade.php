@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ action('PlayerController@create') }}" class="material-btn material-btn--primary">Add a New Player</a>
            <h1>Players</h1>
            <div class="players">
                @foreach ($players as $player)

                    <div class="players__player">
                        <a href="{{ action('PlayerController@show', $player->id )}}">
                            <span class="players__player__name">{{$player->name}}</span>
                        </a>
                        <span class="players__player__actions">
                            <a class="btn btn-default" href="{{ action('PlayerController@show', $player->id) }}" title="Go to player page."><i class="fa fa-eye"></i></a>
                            @if(!Auth::guest())
                            <a class="btn btn-default" href="{{ action('PlayerController@edit', $player->id) }}" title="Edit player."><i class="fa fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE',
                                'action' => ['PlayerController@destroy', $player->id],
                                'class' => 'inline-block',
                                'title' => 'Remove player.'])
                                !!}
                                <button class="btn btn-default" type="submit" name="button" onClick = "return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            @endif
                        </span>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
