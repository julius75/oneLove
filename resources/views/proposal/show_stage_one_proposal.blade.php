@extends('layouts.admin')

@section('content')
    <h3><b>Title:</b> {{$ones->title}}</h3>
    <div class="container">
    <div class="well">
            <h3><b>Organizations details:</b></h3>
            <h4>NAME: {{$ones->organization_name}}</h4>
            <h4>PHONE: {{$ones->phone}}</h4>
            <h4>ADDRESS: {{$ones->address}}</h4>
            <h4>EMAIL: {{$ones->email}}</h4>

            <h5><b>Personal details:</b></h5>
            <h8>name: {{$ones->submitted_by_name}}</h8>
            <h4>company: {{$ones->title_organization}}</h4>
            <h4>summary: {{$ones->summary}}</h4>
        </div>
    </div>

    @if($ones->status=='rejected')

        <a href='{{url("/reject_stage_one/{$ones->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Rejected</a>
    @elseif($ones->status=='not approved')
        <a href='{{url("/reject_stage_one/{$ones->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" >Reject Proposal</a>
        <a href='{{url("/accept_stage_two/{$ones->id}")}}' class="btn btn-primary btn-lg active" role="button" aria-pressed="true"  name="approve">Accept Proposal</a>
    @elseif($ones->status=='accepted')
        <a href="" class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Accepted</a>
    @endif

@endsection