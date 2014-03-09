@extends('master.layout')

@section('body')
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
            <!-- <div class="pure-u-1-4">
                <div class="quickCreate" data-type="category">
                    + Category
                </div>
            </div>
            <div class="pure-u-1-4">
                <div class="quickCreate" data-type="chart">
                    + Chart
                </div>
            </div>   -->     
        </div>  
        <div class="information">
            @foreach($charts as $chart)
                <div id="chart{{ $chart->id }}" data-id="{{ $chart->id }}" class="high-chart">
                </div>
            @endforeach
        </div>
    @else
    <div class="information">
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">Simple in simple out</h3>
                <p>
                    Graph simple data against time easily. MyDataCharter allows you to track simple things quickly and easily. With one account you could track your weight, savings and number of sexual encounters on a day to day basis.
                </p>
            </div>
        </div>
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">Plot once display many</h3>
                <p>
                    Chart data against a category and use it in several charts. No need to enter the same data twice like some kind of chump.
                </p>
            </div>
        </div>
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">Roll your own</h3>
                <p>
                    Install MyDataCharter on your own webserver easily with git and composer. MyDataCharter runs under a simple LAMP stack and the code is open and free.
                </p>
            </div>
        </div>
        <div class="pure-u-1-2">
            <div class="l-box">
                <h3 class="information-head">Automate everything</h3>
                <p>
                    cUrl the API and automate the way you store data in your account. You could use a Raspberry Pi to track the temperature of your homebrew and view it easily in MyDataCharter.
                </p>
            </div>
        </div>
    </div>
    @endif
    <!--</div>-->
</div>
@stop