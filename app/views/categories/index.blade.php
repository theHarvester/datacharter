@extends('master.layout')

@section('body')
<div class="banner">
    <h1 class="banner-head">
        DataCharter
    </h1>
</div>

<div class="l-content">
    <div class="information">
    	<h3 class="information-head">Categories</h3>
	    <ul>
		    @foreach($categories as $category)
		        <li>{{ $category->name }} : {{ $category->user_id }}</li>
		    @endforeach
		</ul>
    </div>
</div>
@stop