@extends('../layouts/app')
@section('content')
<div class="jumbotron">
                <h1>{{Lang::get('layout.books')}}</h1>
                <p>{{Lang::get('layout.info')}}{{$book->title}}</p>
</div>

<div>
        <table class='table table-hover'>
                <tr><td>{{Lang::get('view.title')}}</td><td>{{$book->title}}</td></tr>
                <tr><td>{{Lang::get('view.authors')}}</td><td>
                @foreach($authors as $author)        
                        {{$author->first_name}} {{$author->last_name}}, 
                @endforeach
                </td></tr>
                <tr><td>{{Lang::get('view.category')}}</td><td>
                @foreach($categories as $category)        
                        {{$category->name}}, 
                @endforeach
                </td></tr>
                <tr><td>{{Lang::get('view.isbn')}}</td><td>{{$book->isbn}}</td></tr>
                <tr><td>{{Lang::get('view.publ_date')}}</td><td>{{$book->publ_date}}</td></tr>
                <tr><td>{{Lang::get('view.publ_house')}}</td><td>{{$book->publ_house}}</td></tr>
                <tr><td>{{Lang::get('view.description')}}</td><td>{{$book->description}}</td></tr>
        </table>
        <div>
                <table><tr>
                @if (Auth::user())
                        @if(Auth::user())
                                <td><a class="btn btn-success" href="{{route('book.take',['book'=>$book])}}">{{Lang::get('view.book_take')}}</a></td>
                        @endif
                        @if(Auth::user()->hasRole('Admin'))
                                <td><a class="btn btn-info" href="{{route('book.edit',['book'=>$book->id])}}">{{Lang::get('view.edit')}}</a></td>
                                <td>{!! Form::model($book, ['route' => ['book.delete', $book], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">{{Lang::get('view.delete')}}</button>
                                {!! Form::close() !!}
                                </td>
                        @endif
                @endif
                </tr></table>
        </div>
        
        
</div>

@endsection