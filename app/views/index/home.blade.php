@extends('master.layout')

@section('body')
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
        @if(Auth::check())
            @foreach($charts as $chart)
                <div id="chart{{ $chart->id }}" data-id="{{ $chart->id }}" class="high-chart">
                </div>
            @endforeach
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
    </div>
</div>
@stop