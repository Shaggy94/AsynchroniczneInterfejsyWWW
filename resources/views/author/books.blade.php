@extends('../layouts/app')
@section('content')

<div class="jumbotron">
    <h1>{{$author->last_name}} {{$author->first_name}}</h1>
    <p>{{Lang::get('layout.books_paragraph')}}</p>
</div>


@if (Auth::user() && Auth::user()->hasRole('Admin'))
    <a class="btn btn-success" href="{{route('book.create')}}">{{Lang::get('view.addbook')}}</a>
@endif

        @if(count($books)>0)
            <section class="books">
                @include('author.booksload');
            </section>

        @endif

        <script src="{{ asset('js/book.js') }}" defer></script>
@endsection
