@extends('master.layout')

@section('body')
{{HTML::script('js/data-update.js')}}
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
        <div class="pure-u-1-2">
            <div class="l-box">
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
                    <p>
                        {{ Form::checkbox('category[]', $category->id)  }}
            	    	{{ Form::label('category', $category->name) }}
                	 	
                    </p>	
                    @endforeach
                
                </p>
                <p>
                    <span class="btn_submit">{{ Form::submit('Create') }}</span>
                </p>
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop