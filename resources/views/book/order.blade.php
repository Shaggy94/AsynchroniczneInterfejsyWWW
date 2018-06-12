@extends('../layouts/app')
@section('content')
<div class="jumbotron">
                <h1>{{Lang::get('view.order')}}</h1>
                <p>{{Lang::get('view.orderquestion')}} {{$book->title}}</p>
                {{-- {{$book}} --}}
                @if($store->books_count>0)
                <p>{{Lang::get('view.store_aviable')}} {{$store->books_count}}</p>
                <a class="btn btn-success" href="{{route('book.order',['book'=>$book])}}">{{Lang::get('view.confirm')}}</a>
                {!!link_to(URL::previous(),Lang::get('view.back'),['class'=>'btn btn-danger'])!!}
                @endif
</div>


@endsection