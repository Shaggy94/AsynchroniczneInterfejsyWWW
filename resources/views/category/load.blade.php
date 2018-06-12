<div id="load" style="position: relative;">
        <table class="table table-hover">
                        <tr>
                            <th>{{Lang::get('view.category')}}</th>
                        </tr>
            @foreach($categories as $category)
                <tr>
                    <td><a href="{{route('categories.show',['category'=>$category])}}">{{$category->name}}</a></td>
                </tr>
            @endforeach
        </table>
</div>
{{ $categories->links() }}