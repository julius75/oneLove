@extends('layouts.admin')

@section('content')
        <!DOCTYPE html>
<html>
<head>
    <h3 style="text-align: center; margin-top: auto;">Suggestions</h3>
</head>
<body>

    @if(count($posts)>=1)
        @foreach($posts as $post)
            <div class="well">
                <h3>{{$post->email}}</h3>
                <h3>{{$post->id}}</h3>
            </div>
            @endforeach
        @else
        <p>No Proposals Submitted Yet</p>
        @endif
    {{--@foreach ($proposals as $proposal)--}}
        {{--<tr>--}}
            {{--<td>{{ $number++ }}</td>--}}
            {{--<td>{{ $proposal->email}}</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}

</body>
</html>


</body>
</html>
@endsection