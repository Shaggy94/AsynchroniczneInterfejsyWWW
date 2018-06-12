@extends('../layouts/app')
@section('content')

<div class="col-sm-6">
    {!!Form::open(['route'=>'category.store'])!!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        {!!Form::label('name',Lang::get('view.category_name'))!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
            {!!Form::label('description',Lang::get('view.description'))!!}
            {!!Form::textarea('description',null,['class'=>'form-control'])!!}
        </div>

    <div class="form-group">
        {!!Form::submit(Lang::get('view.confirm'),['class'=>'btn btn-primary'])!!}
        {!!link_to(URL::previous(),Lang::get('view.back'),['class'=>'btn btn-default'])!!}
    </div>

    {!!Form::close()!!}

</div>

@endsection