@extends('../layouts/app')
@section('content')
<div class="jumbotron">
                <h1>{{Lang::get('layout.categories')}}</h1>
                <p>{{Lang::get('layout.info')}}{{$category->name}}</p>
</div>

<div>
        <table class='table table-hover'>
            <tr><td>{{Lang::get('view.last_name')}}</td><td>{{$category->name}}</td></tr>
            <tr><td>{{Lang::get('view.description')}}</td><td>{{$category->description}}</td></tr>
        </table>
        <div>
                <table><tr>
                                <td><a class="btn btn-info" href="{{route('category.showbooks',['category'=>$category])}}">{{Lang::get('view.show_cbooks')}}</a></td>
                @if (Auth::user())
                        @if(Auth::user()->hasRole('Admin'))
                                <td><a class="btn btn-info" href="{{route('category.edit',['category'=>$category->id])}}">{{Lang::get('view.edit')}}</a></td>
                                <td>{!! Form::model($category, ['route' => ['category.delete', $category], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">{{Lang::get('view.delete')}}</button>
                                {!! Form::close() !!}
                                </td>
                        @endif
                @endif
                </tr></table>
        </div>
        
        
</div>

@endsection