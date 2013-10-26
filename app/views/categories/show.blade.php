@extends('master.layout')

@section('body')
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">{{ $category->label }}</h3>
                
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
                <P>
                    <span class="pure-u-1-4">
                        {{ Form::label('date', 'Date') }}
                    </span>
                    <input name="date" id="datepicker">
                </p>
                <p>
                    <span class="btn_submit">{{ Form::submit('Create') }}</span>
                </p>
                {{ Form::hidden('category', $category->id) }}
                {{ Form::close() }}
            </div>
        </div>

        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">Data</h3>
                <ul class="edit-list">
                    <? $i = 0; ?>
                    @foreach($data as $value)
                        <li class="{{ ($i++ % 2 == 0)?'even':'odd'; }}">
                            <div class="edit-me" data-id="{{ $value->id }}" data-type="data" alt="Click to edit">
                                {{ $value->data }}
                            </div>
                            <div class="edit-me" data-id="{{ $value->id }}" data-type="timestamp">
                                {{ $value->timestamp }}
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div id="edit-data">
                    <input type="text" size="43"></input>
                    <br />
                    <button id="edit-save">Save</button>
                    <button id="edit-cancel">Cancel</button>
                    <button id="edit-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


