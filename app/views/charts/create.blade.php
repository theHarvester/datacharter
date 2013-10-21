@extends('master.layout')

@section('body')
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
    	<h3 class="information-head">Create Chart</h3>
    
    {{ Form::open(array('url' => 'charts', 'method' => 'POST')) }}
    <p>
        @if ($errors->any())
            <span class="pure-u-1-4">
            {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error, </strong>:message</div>')) }}
            </span>
        @endif
    </p>
    <p>
    <span class="pure-u-1-4">
        {{ Form::label('name', 'Title') }}
    </span>
    
    {{ Form::text('name', Input::old('name')) }}
    
    </p>
    <p>
    	
    <span class="pure-u-1-4">
		{{ Form::label('categories', 'Categories') }}
    </span>
	    @foreach($categories as $category)
	    	{{ Form::label('category', $category->name) }}
    	 	{{ Form::checkbox('category[]', $category->id)  }}	
        @endforeach
    
    </p>
    <p>
        <span class="btn_submit">{{ Form::submit('Create') }}</span>
    </p>
    
    {{ Form::close() }}
    </div>
</div>
@stop