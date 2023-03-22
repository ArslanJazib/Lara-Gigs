@extends('layout')

@section('content')
    <h1>{{ $heading }}</h1>
    <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }}</a>
    <p>{{ $listing['description'] }}</p>
@endsection