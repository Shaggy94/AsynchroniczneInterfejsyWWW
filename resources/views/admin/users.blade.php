@extends('../layouts/app')
@section('content')

<div class="jumbotron">
    <h1>{{Lang::get('view.admin_users')}}</h1>
</div>

        @if(count($users)>0)
            <section class="users">
                @include('admin.load')
            </section>

        @endif

        <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection
