<div id="load" style="position: relative;">
<table class="table table-hover">
                <tr>
                    <th>{{Lang::get('view.title')}}</th>
                </tr>
    @foreach($books as $book)
        <tr>
            <td><a href="{{route('books.show',['book'=>$book])}}">{{$book->title}}</a></td>
        </tr>
    @endforeach
</table>
</div>
<p id="booksPagination">
{{ $books->links() }}
</p>