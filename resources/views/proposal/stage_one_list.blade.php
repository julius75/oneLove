@extends('layouts.admin')

@section('content')
    <div></div>
    <h3 style="text-align: center; margin-top: auto;">Stage One Proposals Here</h3>
    @if(count($one)>=1)

        @foreach($one as $ones)
            <div class="well">
                <h3>
                    <h3> <u>Title</u>: {{$ones->title}}</h3>
                <h3> <a href="details_stage_one/{{$ones->id}}">
                        <h3><u>Summary</u>: {{$ones->summary}}</h3>
                    </a> </h3>
                <small> Submitted on{{$ones->id}}</small>
            </div>
        @endforeach
    @else
        <p>No Proposals in stage one yet</p>
        @endif
        {!! $one->links() !!}
</div>
@endsection
