@extends('master.layout')

@section('body')
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
    	<h3 class="information-head">Create Data</h3>
    
    {{ Form::open(array('url' => 'categories', 'method' => 'POST')) }}
    <p>
        @if ($errors->any())
            <span class="pure-u-1-4">
            {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error, </strong>:message</div>')) }}
            </span>
        @endif
    </p>
    <p>
    <span class="pure-u-1-4">
        {{ Form::label('label', 'Label') }}
    </span>
    
    {{ Form::text('label', Input::old('label')) }}
    </p>
    
    <p>
        <span class="btn_submit">{{ Form::submit('Create') }}</span>
    </p>
    
    {{ Form::close() }}
    </div>
</div>
@stop