@extends('layouts.admin')

@section('content')
<h1>{{$post->title}}</h1>
    <small>Auther: {{$post->email}} </small>
    <div>
        {{$post->budget}}
    </div>
@if($post->status=='rejected')

    <a href='{{url("/reject/{$post->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Rejected</a>
    @elseif($post->status=='not approved')
    <a href='{{url("/reject/{$post->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" >Reject Proposal</a>
    <a href='{{url("/accept-stage-one/{$post->id}")}}' class="btn btn-primary btn-lg active" role="button" aria-pressed="true"  name="approve">Accept Proposal</a>
@elseif($post->status=='accepted')
    <a href="" class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Accepted</a>
@endif


@endsection