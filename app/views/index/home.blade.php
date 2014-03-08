@extends('master.layout')

@section('body')
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    @if(Auth::check())
        <div class="information">
            <div id="quickCreateToggle" class="pure-u-1-5">+</div>
            <div class="pure-u-1-4">
                <div class="quickCreate" data-type="data">
                    + Data
                </div>
                <div id="quickDataForm" class="quickForm">
                    {{ Form::open(array('url' => 'data', 'method' => 'POST')) }}
                    <p>
                        {{ Form::label('value', 'Amount') }}
                        {{ Form::text('value', Input::old('value')) }}
                    </p>
                    <p>
                        {{ Form::label('category', 'Category') }}
                        {{ Form::select('category', $categorySelect ) }}
                    </p>
                    <P>
                        {{ Form::label('date', 'Date') }}
                        <input name="date" id="datepicker">
                    </p>
                    <p>
                        <span class="btn_submit">{{ Form::submit('Create') }}</span>
                    </p>
                    
                    {{ Form::close() }}
                </div>
            </div>
            <div class="pure-u-1-4">
                <div class="quickCreate" data-type="category">
                    + Category
                </div>
            </div>
            <div class="pure-u-1-4">
                <div class="quickCreate" data-type="chart">
                    + Chart
                </div>
            </div>       
        </div>  
        <div class="information">
            @foreach($charts as $chart)
                <div id="chart{{ $chart->id }}" data-id="{{ $chart->id }}" class="high-chart">
                </div>
            @endforeach
        </div>
    @else
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">24/7 customer support</h3>
                <p>
                    Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">Cancel your plan anytime</h3>
                <p>✓
                    Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    @endif
    <!--</div>-->
</div>
@stop