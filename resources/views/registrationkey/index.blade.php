@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Registrationkeys</h1>
            {!! Form::open(['action' => 'RegistrationkeysController@store', 'class' => 'form']) !!}
            {!! Form::submit('Create Thing', ['class' => 'material-btn']) !!}
            {!! Form::close() !!}
            <div class="registrationkeys">
                @foreach ($keys as $key)
                    <div class="registrationkeys__registrationkey">
                        <div class="registrationkeys__registrationkey__key">
                            <button data-clipboard-target="#share-key{{ $key->id }}" class="share-btn btn-unstyled" type="button" name="button" title="Copy to Clipboard.">
                              <i class="fa fa-clipboard"></i>
                            </button>
                            <input type="text" id="share-key{{ $key->id }}" readonly class="form-control inline-block registrationkeys__registrationkey__key" value="{{ $key->key }}">
                        </div>
                        <span class="registrationkeys__registrationkey__valid-until">{{ $key->valid_until }}</span>
                        <span class="registrationkeys__registrationkey__actions">
                            {!! Form::open(['method' => 'DELETE',
                                'action' => ['RegistrationkeysController@destroy', $key->id],
                                'class' => 'inline-block',
                                'title' => 'Remove registration key.'])
                                !!}
                                <button class="btn btn-default" type="submit" name="button" onClick = "return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
