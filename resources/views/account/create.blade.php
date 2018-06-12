@extends('../layouts/app')
@section('content')

<div class="col-md-12">
    {!!Form::open(['route'=>'user.store'])!!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        {!!Form::label('topic',Lang::get('view.title'))!!}
        {!!Form::text('topic',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
            {!!Form::label('message',Lang::get('view.description'))!!}
            {!!Form::textarea('message',null,['class'=>'form-control'])!!}
        </div>

    <div class="form-group">
        {!!Form::submit(Lang::get('view.confirm'),['class'=>'btn btn-primary'])!!}
        {!!link_to(URL::previous(),Lang::get('view.back'),['class'=>'btn btn-default'])!!}
    </div>

    {!!Form::close()!!}

</div>

@endsection