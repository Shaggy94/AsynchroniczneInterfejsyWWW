<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{Lang::get('layout.webtitle')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{Lang::get('layout.account')}}</a>
                    @else
                        <a href="{{ route('login') }}">{{Lang::get('layout.login')}}</a>
                        <a href="{{ route('register') }}">{{Lang::get('layout.register')}}</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{Lang::get('layout.webtitle')}}
                </div>

                <div class="links">
                    <a href="{{route('books.index')}}">{{Lang::get('layout.books')}}</a>
                    <a href="{{route('authors.index')}}">{{Lang::get('layout.authors')}}</a>
                    <a href="{{route('categories.index')}}">{{Lang::get('layout.categories')}}</a>
                    <a href="https://laravel-news.com">{{Lang::get('layout.contact')}}</a>
                    
                    @if (Auth::user() && Auth::user()->hasRole('Admin'))
                        <a href="{{route('admin.panel')}}">{{Lang::get('layout.admin_panel')}}</a>
                    @endif
                    
                </div>
            </div>
        </div>
    </body>
</html>
