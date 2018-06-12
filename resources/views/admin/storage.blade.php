@extends('../layouts/app')
@section('content')

<div class="jumbotron">
    <h1>{{Lang::get('layout.storage')}}</h1>
</div>

        @if(count($books)>0)
            <section class="books">
                @include('admin.loadstorage')
            </section>

        @endif

        <script src="{{ asset('js/store.js') }}" defer></script>
@endsection
