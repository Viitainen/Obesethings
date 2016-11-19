@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="material-jumbotron">
                <h1 class="uppercase"><i class="fa fa-user"></i> {{ $player->name }} Things</h1>
            </div>
        </div>
            <div class="player__things">
                @foreach($player->things as $thing)
                    <div class="col-md-6">
                        <div class="thing">
                            <h4>{{ $thing->title }}</h4>
                            <div class="video-container">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/OYV4vIe0r04" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
@endsection
