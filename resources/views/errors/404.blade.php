@extends('layouts.frontend')

@section('content')

    <h1>The page you are looking for doesnot exist on RidBlog</h1>

    <a href="{{ route('home.frontpage') }}" class="btn btn-primary">Go Back Home</a>

@stop

@section('header_spacer')
    <div class="header-spacer"></div>
@stop