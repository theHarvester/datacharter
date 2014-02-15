@extends('master.layout')

@section('body')
{{HTML::script('js/chart-update.js')}}
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
        <div class="pure-u-1-2">
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
                    <? $cId = 'category'.$category->id; ?>
            	 	{{ Form::checkbox('category[]', $category->id, false, array('id' => $cId))  }}
                    {{ Form::label('category', $category->name, array('class' => 'checkboxLabel', 'for' => $cId)) }}
                 </p>
                @endforeach
            
            </p>
            <p>
            <span class="pure-u-1-4">
                {{ Form::label('axis_label', 'Axis Label') }}
            </span>
            
            {{ Form::text('axis_label', Input::old('axis_label')) }}
            
            </p>
            <p>
            <span class="pure-u-1-4">
                {{ Form::label('unit_label', 'Unit Label') }}
            </span>
            
            {{ Form::text('unit_label', Input::old('unit_label')) }}
            
            </p>
            <p>
                <span class="btn_submit">{{ Form::submit('Create') }}</span>
            </p>
            
            {{ Form::close() }}
        </div>
        <div class="pure-u-1-2">
            <h3 class="information-head">Edit Charts</h3>
            <ul class="edit-list">
                <? $i = 0; ?>
                @foreach($charts as $chart)
                    <li class="{{ ($i++ % 2 == 0)?'even':'odd'; }}">
                        <div class="edit-me" data-id="{{ $chart->id }}" data-type="name" alt="Click to edit">
                            {{ $chart->name }}
                        </div>
                        <div class="edit-me" data-id="{{ $chart->id }}" data-type="unit">
                            {{ $chart->unit }}
                        </div>
                        <div class="edit-me" data-id="{{ $chart->id }}" data-type="axis_label">
                            {{ $chart->axis_label }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <div id="edit-charts">
                <input type="text" size="43"></input>
                <br />
                <button id="edit-save">Save</button>
                <button id="edit-cancel">Cancel</button>
                <button id="edit-delete">Delete</button>
            </div>
        </div>
    </div>

</div>
@stop