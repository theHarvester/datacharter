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
        var urlPathPrefix = "{{url('/', $parameters = array(), $secure = null)}}";
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
    @yield('body')
</body>
</html>

    {{--
    @if(Session::has('flash_notice'))
        <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
    @endif
    --}}