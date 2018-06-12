@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>{{Lang::get('layout.homepage')}} {{Auth::user()->name}}</h1>
            </div>
            <table class='table table-hover'>
            <tr><td>{{Lang::get('view.topic')}}</td><td>{{Lang::get('view.status')}}</td></tr>
            @foreach($messages as $message)
            <tr>
                <td>
                    @if(Auth::user()->hasRole('Admin'))
                    <a href="{{route('admin.messagestree',['message'=>$message])}}" class="btn btn-default">{{$message->topic}}</a></td>

                    @else
                    <a href="{{route('account.messagestree',['message'=>$message])}}" class="btn btn-default">{{$message->topic}}</a></td>
                    @endif
                <td>
                    @if(Auth::user()->hasRole('Admin'))
                        @if($message->status==0)
                            {{Lang::get('view.status_noanswer')}}
                        @else
                            {{Lang::get('view.status_answer')}}
                        @endif
                    @else
                        @if($message->status==1)
                            {{Lang::get('view.status_noanswer')}}
                        @else
                            {{Lang::get('view.status_answer')}}
                        @endif
                    @endif

                </td>
            </tr>

            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
