@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>{{$message->topic}}</h1>
                <p>{{$message->message}}</p>
            </div>
            @foreach($messages as $mes)
            
            @if($mes->message_author_id==1)
                <p class="alert alert-success">{{$mes->message}}</p>
            @else
                <p class="alert alert-info">{{$mes->message}}</p>
            @endif
            @endforeach


    {!!Form::open(['route'=>'user.answer'])!!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {{ Form::hidden('message_id', $message->id)}}
    {{ Form::hidden('topic', $message->topic)}}

    <div class="form-group">
            {!!Form::label('message',Lang::get('view.description'))!!}
            {!!Form::textarea('message',null,['class'=>'form-control'])!!}
        </div>

    <div class="form-group">
        {!!Form::submit(Lang::get('view.answer'),['class'=>'btn btn-primary'])!!}
        {!!link_to(URL::previous(),Lang::get('view.back'),['class'=>'btn btn-default'])!!}
    </div>

    {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
