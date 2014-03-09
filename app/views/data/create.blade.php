@extends('master.layout')

@section('body')
<div class="l-content">
    <div class="information">
    	<h3 class="information-head">Create Data</h3>
    
        {{ Form::open(array('url' => 'data', 'method' => 'POST')) }}
        <p>
            @if ($errors->any())
                <span class="pure-u-1-4">
                {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error, </strong>:message</div>')) }}
                </span>
            @endif
        </p>
        <p>
        <span class="pure-u-1-4">
            {{ Form::label('value', 'Amount') }}
        </span>
        
        {{ Form::text('value', Input::old('value')) }}
        
        </p>
        <p>
        	
        <span class="pure-u-1-4">
    		{{ Form::label('category', 'Category') }}
        </span>
    	    {{ Form::select('category', $categorySelect ) }}
        
        </p>
        <P>
            <span class="pure-u-1-4">
                {{ Form::label('date', 'Date') }}
            </span>
        	<input name="date" id="datepicker">
        </p>
        <p>
            <span class="btn_submit">{{ Form::submit('Create') }}</span>
        </p>
        
        {{ Form::close() }}
    </div>
    
</div>
@stop