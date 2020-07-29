@extends('layouts.app')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section("content")

<div class="error">
	
	<h2>404</h2>
	<p>{{__('Not Found')}}</p>
	<br>
	<p><a href="/">{{__("Go Home")}}</a></p>

</div>

@endsection()