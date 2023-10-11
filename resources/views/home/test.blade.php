
@extends('layouts.frontbase')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>Hello Test Function</h1>
    {{$user->id}}<br>
    {{$user->name}}<br>
@endsection
@section('foot')
@endsection
