@extends('layouts.app')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

@section("content")

<div class="error">
	
	<h2>500</h2>
	<p>{{__('Not Found')}}</p>
	<br>
	<p><a href="/">{{__("Go Home")}}</a></p>

</div>

@endsection()