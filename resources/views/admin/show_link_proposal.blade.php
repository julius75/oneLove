@extends('layouts.admin')

@section('content')
<h1>{{$post->title}}</h1>
    <small>Auther: {{$post->email}} </small>
    <div>
        {{$post->budget}}
    </div>
<a href="#" class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" >Reject Proposal</a>
<a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Accept Proposal</a>
@endsection