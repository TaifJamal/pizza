@extends('site.master')
@section('titel', 'Menu | ' . env('APP_NAME'))
@section('content')

    @include('site.part.meals')

    @include('site.part.category')
@stop
