<div id="load" style="position: relative;">
        <table class="table table-hover">
                        <tr>
                            <th>{{Lang::get('view.author')}}</th>
                        </tr>
            @foreach($authors as $author)
                <tr>
                    <td><a href="{{route('authors.show',['author'=>$author])}}">{{$author->last_name}} {{$author->first_name}}</a></td>
                </tr>
            @endforeach
        </table>
        </div>
        <p id="authorsPagination">
        {{ $authors->links() }}
        </p>