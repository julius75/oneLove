@extends('layouts.admin')
@section('header')
    Home Dashboard
    @endsection
@section('content')
<h1>ONE LOVE ADMIN------({{Auth::user()->name}})</h1>

    @endsection