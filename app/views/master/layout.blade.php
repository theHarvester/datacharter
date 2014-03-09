<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Charter</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,100italic,400,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    {{HTML::style('css/normalize.css')}}
    {{HTML::style('css/datepicker.css')}}
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/page.css') }}">
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/mixins.less') }}">
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/styles.less') }}">
    {{HTML::style('css/clear.css')}}
    {{HTML::script('js/less-1.4.1.min.js')}}
    {{HTML::script('js/jquery-ui-1.10.3.custom.min.js')}}
    {{HTML::script('js/functions.js')}}
    {{HTML::script('js/Highcharts-3.0.6/js/highcharts.js')}}
    <script type="text/javascript">
    //<!--
        var urlPathPrefix = "{{url('/', $parameters = array(), $secure = null)}}";
    // -->
    </script>
</head>
<body>
    <div id="menu-show-btn">
        <div class="menu-icon-bar top white">&nbsp;</div>
        <div class="menu-icon-bar middle white">&nbsp;</div>
        <div class="menu-icon-bar bottom white">&nbsp;</div>
    </div>
    <div id="menu-container">
        <div id="menu-title">Settings</div>
        <ul>
            <li>
            {{link_to_route('home', 'Home', $parameters = array(), $attributes = array())}}
            </li>
            @if(Auth::guest())
                <li>
                {{link_to_route('login', 'Login', $parameters = array(), $attributes = array())}}
                </li>
            @else
                <li>
                {{link_to_action('DataController@create', 'Add Data', $parameters = array(), $attributes = array())}}
                </li>
                <li>
                {{link_to_action('CategoriesController@create', 'Categories', $parameters = array(), $attributes = array())}}
                </li>
                <li>
                {{link_to_action('ChartsController@create', 'Charts', $parameters = array(), $attributes = array())}}
                </li>
                <li>
                {{link_to_route('logout', 'Logout', $parameters = array(), $attributes = array())}}
                </li>
                
            @endif
        </ul>
    </div>
    <div id="banner">
        <div id="banner-container">
            <div id="banner-svg">
                <svg width="180" height="140" xmlns="http://www.w3.org/2000/svg">
                 <!-- Created with SVG-edit - http://svg-edit.googlecode.com/ -->
                 <g>
                  <title>Layer 1</title>
                  <ellipse fill="#ffffff" stroke="#000000" stroke-width="0" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" cx="28" cy="96" id="svg_2" rx="13" ry="13"/>
                  <ellipse fill="#ffffff" stroke="#000000" stroke-width="0" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" cx="78" cy="56" rx="13" ry="13" id="svg_7"/>
                  <line fill="none" stroke="#ffffff" stroke-width="15" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" x1="29" y1="97" x2="75" y2="58" id="svg_6"/>
                  <ellipse fill="#ffffff" stroke="#000000" stroke-width="0" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" cx="109" cy="106" rx="13" ry="13" id="svg_9"/>
                  <ellipse fill="#ffffff" stroke="#000000" stroke-width="0" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" cx="154" cy="26" rx="13" ry="13" id="svg_10"/>
                  <line fill="none" stroke-width="15" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" x1="78" y1="53" x2="113" y2="112" id="svg_13" stroke="#ffffff"/>
                  <line fill="none" stroke-width="15" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" x1="154" y1="28" x2="107" y2="109" id="svg_14" stroke="#ffffff"/>
                 </g>
                </svg>
            </div>
            <h1 id="banner-head">
                MyDataCharter
            </h1>
        </div>
    </div>
    @yield('body')
</body>
</html>

    {{--
    @if(Session::has('flash_notice'))
        <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
    @endif
    --}}