@extends('layouts.app')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section("content")

<div class="error">
	
	<h2>403</h2>
	<p>{{__($exception->getMessage() ?: 'Forbidden')}}</p>
	<a href="/">{{__("Go Home")}}</a>

</div>

@endsection()
