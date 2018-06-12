@extends('../layouts/app')
@section('content')

<div class="jumbotron">
    <h1>{{Lang::get('layout.categories')}}</h1>
    <p>{{Lang::get('layout.category_paragraph')}}</p>
</div>



@if (Auth::user() && Auth::user()->hasRole('Admin'))
    <a class="btn btn-success" href="{{route('category.create')}}">{{Lang::get('view.addcategory')}}</a>
@endif
        @if(count($categories)>0)
            <section class="categories">
                @include('category.load')
            </section>

        @endif

        <script src="{{ asset('js/category.js') }}" defer></script>
@endsection
