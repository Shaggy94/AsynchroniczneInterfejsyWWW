@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>{{Lang::get('layout.homepage')}} {{Auth::user()->name}}</h1>
            </div>
            <ul>
                    {{-- @if(DB::table('users_roles')->where('user_id',Auth::user()->id)->first()->role_id==3) --}}

                    @if(Auth::user()->hasRole('Banned'))
                    <p class="alert alert-danger">{{Lang::get('view.banned')}}</p>
                    @endif
                <li><a href="{{ route('account.orders') }}" class="btn btn-default">{{Lang::get('layout.orders')}}</a></li>
                <li><a href="{{route('account.history')}}" class="btn btn-default">{{Lang::get('view.history')}}</a></li>                
                <li><a href="{{route('account.info')}}" class="btn btn-default">{{Lang::get('view.editaccount')}}</a></li>
                @if(Auth::user()->hasRole('Admin'))

                @else
                <li><a href="{{route('user.create')}}" class="btn btn-default">{{Lang::get('view.supportmessage')}}</a></li> 
                <li><a href="{{route('account.messages')}}" class="btn btn-default">{{Lang::get('view.mymessages')}}</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
