@extends('../layouts/app')
@section('content')

<div class="jumbotron">
    <h1>{{Lang::get('layout.authors')}}</h1>
    <p>{{Lang::get('layout.authors_paragraph')}}</p>
</div>



@if (Auth::user() && Auth::user()->hasRole('Admin'))
    <a class="btn btn-success" href="{{route('author.create')}}">{{Lang::get('view.addauthor')}}</a>
@endif
        @if(count($authors)>0)
            <section class="authors">
                @include('author.load')
            </section>

        @endif

        <script src="{{ asset('js/author.js') }}" defer></script>
@endsection
