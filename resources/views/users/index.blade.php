<x-app-layout>
  <x-layout>
    <h1>Users:</h1>
    <form method="post" action="{{route('users.filter')}}">
      @csrf
      <div class="input-group">
          <input class="form-control" name="filter" id="filter" placeholder="filter..." value="{{ isset($filter) ? $filter : ''}}">
          <button type="submit" class="btn btn-primary">filter</button>
          <a class="btn btn-secondary" href="{{ route('users.clear') }}" style="margin-left: 10px">Clear</a>
      </div>
    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <x-table :users="$users" id="users">
      @foreach($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->email }}</td>
          <td>{{ $user->password }}</td>
          <td>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
              <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

              @csrf
              @method('DELETE')

              {{-- <input type="hidden" name="_method" value="GET" /> --}}
              <button type="submit" class="btn btn-danger">Delete</button>

            </form>
          </td>
        </tr>
      @endforeach
    </x-table>
    {{ $users->links() }}
    </div>
  </x-layout>
</x-app-layout>

<script>
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#filter').on('keyup',function(){
          var query= $(this).val();
          // console.log(query);
          $.ajax({
            url:"users/filter",
            type:"POST",
            data:{'filter':query},
            success:function(data){
              console.log(data);
              $('#users');
            }
          });
          //end of ajax call
        });
      });
</script>

