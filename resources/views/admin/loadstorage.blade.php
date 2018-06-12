<div id="load" style="position: relative;">
<table class="table table-hover">
                <tr>
                    <th>{{Lang::get('view.title')}}</th>
                    <th>{{Lang::get('view.count')}}</th>
                </tr>
    @foreach($books as $book)
        <tr>
        <td>{{$book->title}}</td>
        <td>{{$book->books_count}}</td>
        </tr>
    @endforeach
</table>
</div>
<p id="booksPagination">
{{ $books->links() }}
</p>