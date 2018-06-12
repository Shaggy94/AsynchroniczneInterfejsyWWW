<div id="load" style="position: relative;">
        <table class="table table-hover">
                        <tr>
                            <th>{{Lang::get('view.user')}}</th>
                        </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->hasRole('Admin'))
                            {{Lang::get('view.admin')}}
                        @else
                            @if($user->hasRole('User'))
                    <a href="{{route('admin.ban',['user'=>$user])}}" class="btn btn-danger">{{Lang::get('view.ban')}}</a>
                            @else
                            <a href="{{route('admin.unban',['user'=>$user])}}" class="btn btn-success">{{Lang::get('view.unban')}}</a>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
        <p id="usersPagination">
        {{ $users->links() }}
        </p>