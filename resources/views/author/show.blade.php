@extends('../layouts/app')
@section('content')
<div class="jumbotron">
                <h1>{{Lang::get('layout.authors')}}</h1>
                <p>{{Lang::get('layout.info')}}{{$author->last_name}} {{$author->first_name}}</p>
</div>

<div>
        <table class='table table-hover'>
            <tr><td>{{Lang::get('view.last_name')}}</td><td>{{$author->last_name}}</td></tr>
            <tr><td>{{Lang::get('view.first_name')}}</td><td>{{$author->first_name}}</td></tr>
            <tr><td>{{Lang::get('view.description')}}</td><td>{{$author->description}}</td></tr>
        </table>
        <div>
                <table><tr>
                <td><a class="btn btn-info" href="{{route('author.showbooks',['author'=>$author])}}">{{Lang::get('view.show_books')}}</a></td>
                @if (Auth::user())
                        @if(Auth::user()->hasRole('Admin'))
                                <td><a class="btn btn-info" href="{{route('author.edit',['author'=>$author->id])}}">{{Lang::get('view.edit')}}</a></td>
                                <td>{!! Form::model($author, ['route' => ['author.delete', $author], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">{{Lang::get('view.delete')}}</button>
                                {!! Form::close() !!}
                                </td>
                        @endif
                @endif
                </tr></table>
        </div>
        
        
</div>

@endsection