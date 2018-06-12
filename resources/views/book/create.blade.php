@extends('../layouts/app')
@section('content')

<div class="col-sm-6">
    {!!Form::open(['route'=>'book.store'])!!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        {!!Form::label('title',Lang::get('view.title'))!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
            {!! Form::Label('authors_id[]',Lang::get('view.authors')) !!}
            {!! Form::select('authors_id[]', $authors, null, ['multiple'=>'multiple','placeholder' => 'Wybierz autora','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('isbn',Lang::get('view.isbn'))!!}
        {!!Form::text('isbn',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('publ_date',Lang::get('view.publ_date'))!!}
        {!!Form::date('publ_date',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('publ_house',Lang::get('view.publ_house'))!!}
        {!!Form::text('publ_house',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
            {!! Form::Label('categories_id[]',Lang::get('view.category')) !!}
            {!! Form::select('categories_id[]', $categories, null, ['multiple'=>'multiple','placeholder' => 'Wybierz kategorię','class' => 'form-control']) !!}
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