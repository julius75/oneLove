@extends('layouts.admin')

@section('content')
    <div></div>
    <h3 style="text-align: center; margin-top: auto;">Stage Two Proposals Here</h3>
    @if(count($two)>=1)

    @foreach($two as $twos)
        <div class="well">
            <h3>
                <h3> <u>Title</u>: {{$twos->title}}</h3>
                <h3> <a href="details_stage_one/{{$twos->id}}">
                        <h3><u>Summary</u>: {{$twos->summary}}</h3>
                    </a> </h3>
                <small> Submitted on{{$twos->id}}</small>
        </div>
    @endforeach
    @else
        <p>No Proposals in stage one yet</p>
        @endif
        {!! $two->links() !!}
</div>
@endsection