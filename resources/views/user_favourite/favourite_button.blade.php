@if (Auth::user()->is_favouriting($micropost->id))
        {!! Form::open(['route' => ['favourite.unfavourite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavourite', ['class' => "btn btn-danger btn-block-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favourite.favourite', $micropost->id]]) !!}
            {!! Form::submit('Favourite', ['class' => "btn btn-primary btn-block-xs"]) !!}
        {!! Form::close() !!}
@endif