@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>{{Lang::get('layout.admin_panel')}}</h1>
            </div>
                <li><a href="{{route('admin.users') }}" class="btn btn-default">{{Lang::get('view.admin_users')}}</a></li>
                <li><a href="{{route('admin.messages')}}" class="btn btn-default">{{Lang::get('view.admin_messages')}}</a></li>                
                <li><a href="{{route('admin.store')}}" class="btn btn-default">{{Lang::get('view.admin_store')}}</a></li> 
            </div>
        </div>
    </div>
</div>
@endsection
