@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>{{Lang::get('view.history')}}</h1>
            </div>
            <div>
                @if(count($list)>0)
                <table class='table table-hover'>
                    <tr>
                        <td>{{Lang::get('view.title')}}</td>
                        <td>{{Lang::get('view.order_date')}}</td>
                        <td>{{Lang::get('view.options')}}</td>
                    </tr>
                    @foreach($list as $value)   
                    <tr>
                        <td>{{$value->title}}</td>
                        <td>{{$value->order_date}}</td>
                        <td>
                            @if($value->return_date==null)
                            <a href="{{route('book.return',['book'=>$value->book_id,'order'=>$value->id])}}" class="btn btn-info">{{Lang::get('view.bookreturn')}}</a>
                            @else
                            {{$value->return_date}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                @else
                <div>
                {{Lang::get('view.clearhistory')}}

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
